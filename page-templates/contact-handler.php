<?php

/**
 * Contact form POST handler.
 *
 * Routes to this file when ?q=contact-handler via index.php.
 *
 * SETUP REQUIRED:
 *   1. Create includes/config.php (excluded from version control) and define:
 *      define('RECAPTCHA_SECRET', 'your_recaptcha_v3_secret_key');
 *      define('CONTACT_EMAIL',    'your@email.com');
 *
 *   2. Replace YOUR_RECAPTCHA_SITE_KEY in footer.js and header.php with
 *      your actual site key from console.cloud.google.com.
 */

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	die('Method not allowed');
}

// Load config (site key, email address)
$config_path = ABS_PATH . 'includes/config.php';
if (file_exists($config_path)) {
	require_once $config_path;
}

$recaptcha_secret = defined('RECAPTCHA_SECRET') ? RECAPTCHA_SECRET : '';
$contact_email    = defined('CONTACT_EMAIL')    ? CONTACT_EMAIL    : 'info@codievolt.com';

// ─── HONEYPOT ──────────────────────────────────────────────────────────────────
// Bots fill hidden fields — silently discard without revealing the trap

if (!empty($_POST['website'])) {
	header('Content-Type: application/json');
	echo json_encode(['success' => true]); // fake success
	exit;
}

// ─── COLLECT & SANITISE ────────────────────────────────────────────────────────

$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));
$token   = trim($_POST['g-recaptcha-response'] ?? '');

// ─── VALIDATE ──────────────────────────────────────────────────────────────────

$errors = [];

if (mb_strlen($name) < 2) {
	$errors[] = 'Please enter your name (at least 2 characters).';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors[] = 'Please enter a valid email address.';
}

if (mb_strlen($message) < 10) {
	$errors[] = 'Please enter a message (at least 10 characters).';
}

if (mb_strlen($message) > 5000) {
	$errors[] = 'Your message is too long — please keep it under 5,000 characters.';
}

// ─── RECAPTCHA V3 VERIFICATION ─────────────────────────────────────────────────

if (empty($errors) && !empty($recaptcha_secret)) {
	if (empty($token)) {
		$errors[] = 'Security verification failed. Please try again.';
	} else {
		$verify_context = stream_context_create([
			'http' => [
				'method'  => 'POST',
				'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
				'content' => http_build_query([
					'secret'   => $recaptcha_secret,
					'response' => $token,
					'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
				]),
				'timeout' => 5,
			],
		]);

		$verify_response = @file_get_contents(
			'https://www.google.com/recaptcha/api/siteverify',
			false,
			$verify_context
		);

		$verify_data = $verify_response ? json_decode($verify_response, true) : null;

		// Reject if score is too low (< 0.6 suggests bot)
		if (!$verify_data || !$verify_data['success'] || ($verify_data['score'] ?? 0) < 0.6) {
			$errors[] = 'Security verification failed. Please try again.';
		}
	}
}

// ─── RETURN ERRORS ─────────────────────────────────────────────────────────────

if (!empty($errors)) {
	header('Content-Type: application/json');
	http_response_code(422);
	echo json_encode(['success' => false, 'errors' => $errors]);
	exit;
}

// ─── SEND EMAIL (PHPMailer via SMTP) ───────────────────────────────────────────

$autoloader = ABS_PATH . 'vendor/autoload.php';
if (!file_exists($autoloader)) {
	header('Content-Type: application/json');
	http_response_code(500);
	echo json_encode(['success' => false, 'errors' => ['Mail system not configured. Please email us directly.']]);
	exit;
}
require_once $autoloader;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$subject_labels = [
	'web-design'  => 'Web Design & Build',
	'wpmailblox'  => 'WP Mailblox',
	'other'       => 'Other',
];

$subject_label = $subject_labels[$subject] ?? $subject;
$email_subject = 'Codievolt enquiry' . ($subject_label ? ' — ' . $subject_label : '');

$mail = new PHPMailer(true);
$sent = false;

try {
	$mail->isSMTP();
	$mail->CharSet    = 'UTF-8';
	$mail->Host       = defined('SMTP_HOST')   ? SMTP_HOST   : 'localhost';
	$mail->SMTPAuth   = true;
	$mail->Username   = defined('SMTP_USER')   ? SMTP_USER   : $contact_email;
	$mail->Password   = defined('SMTP_PASS')   ? SMTP_PASS   : '';
	$mail->SMTPSecure = defined('SMTP_SECURE') ? SMTP_SECURE : PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port       = defined('SMTP_PORT')   ? SMTP_PORT   : 465;

	$mail->setFrom(defined('SMTP_USER') ? SMTP_USER : $contact_email, 'Codievolt');
	$mail->addAddress($contact_email);
	$mail->addReplyTo($email, $name);

	$mail->Subject = $email_subject;
	$mail->Body    = implode("\n", [
		"Name:    {$name}",
		"Email:   {$email}",
		"Topic:   {$subject_label}",
		"",
		"Message:",
		$message,
		"",
		"---",
		"Sent from codievolt.com contact form",
		"IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'),
		"Time: " . date('Y-m-d H:i:s T'),
	]);

	$mail->send();
	$sent = true;
} catch (Exception $e) {
	$sent = false;
}

// ─── RESPOND ───────────────────────────────────────────────────────────────────

header('Content-Type: application/json');

if ($sent) {
	echo json_encode(['success' => true]);
} else {
	http_response_code(500);
	echo json_encode([
		'success' => false,
		'errors'  => ['There was a problem sending your message. Please email us directly at info@codievolt.com'],
	]);
}

exit;
