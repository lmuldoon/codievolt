<?php

/**
 * Header for the site.
 */

global $meta;

?>
<!DOCTYPE html>
<html class="no-js" lang="en-gb">

<head>
	<!-- Swap no-js → js synchronously so CSS can pre-hide animated elements before first paint -->
	<script>
		document.documentElement.classList.replace('no-js', 'js');
	</script>
	<?php $DOMAIN = 'codievolt.com';
	$re = "/^(?:www\.)?" . str_replace('.', "\.", $DOMAIN) . "$/";
	$IS_LIVE = preg_match($re, $_SERVER['SERVER_NAME']);
	?>
	<?php if ($IS_LIVE) { ?>
		<script src="https://cdn.cookiehub.eu/c2/5319da8c.js"></script>
		<script type="text/javascript">
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('consent', 'default', {
				'security_storage': 'granted',
				'functionality_storage': 'denied',
				'personalization_storage': 'denied',
				'ad_storage': 'denied',
				'ad_user_data': 'denied',
				'ad_personalization': 'denied',
				'analytics_storage': 'denied',
				'wait_for_update': 500
			});
			document.addEventListener("DOMContentLoaded", function(event) {
				var cpm = {};
				window.cookiehub.load(cpm);
			});
		</script>
	<?php  } ?>

	<?php if (isset($meta->noindex) && $meta->noindex) : ?>
		<meta name="robots" content="noindex">
	<?php endif; ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $meta->title; ?></title>
	<meta name="description" content="<?php echo $meta->description; ?>">

	<!-- Start Favicons -->
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
	<meta name="apple-mobile-web-app-title" content="CodieVolt" />
	<link rel="manifest" href="/site.webmanifest" />
	<!-- End Favicons -->

	<link rel="stylesheet" type="text/css" href="/<?php echo get_revision('screen.css'); ?>">
	<link rel="stylesheet" type="text/css" href="/<?php echo get_revision('print.css'); ?>">

	<script type="text/javascript" src="/<?php echo get_revision('header.js'); ?>"></script>

	<!-- Google reCAPTCHA v3 -->
	<script src="https://www.google.com/recaptcha/api.js?render=6LcHo80sAAAAAGevrlghKLg-U_wScxNdCSrw3xNJ" async defer></script>

	<?php if ($IS_LIVE) { ?>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3PM0NDTPW"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-Y3PM0NDTPW');
		</script>
	<?php } ?>
</head>
<?php
$is_single_page = strpos($meta->slug, 'news/') === 0;
?>

<body class="page page-<?php echo $meta->slug; ?> <?php echo $is_single_page ? 'page-news-single' : ''; ?>" id="top">
	<a href="#maincontent" class="skip-link">Skip to main content</a>

	<?php // Load all SVG icons as hidden spritesheet
	?>
	<div hidden>
		<?php include_asset('static/icons.svg'); ?>
	</div>

	<header class="site-header js-site-header" role="banner" id="js-site-header">
		<div class="site-header__inner">
			<div class="container">

				<div class="site-header__bar">
					<a href="/" class="site-logo" aria-label="Codievolt home">
						<?php include_asset('static/logo.svg'); ?>
					</a>

					<!-- Desktop nav -->
					<nav class="site-nav--desktop" aria-label="Main navigation">
						<ul class="site-menu">

							<!-- Products dropdown -->
							<li class="has-dropdown">
								<button class="site-menu__link site-menu__dropdown-trigger" aria-expanded="false" aria-haspopup="true" id="products-trigger">
									Products
									<svg class="dropdown-chevron" aria-hidden="true" focusable="false" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</button>
								<ul class="site-dropdown" id="products-dropdown" role="menu" aria-labelledby="products-trigger">
									<li role="none">
										<a class="site-dropdown__item" href="https://wpmailblox.com" target="_blank" rel="noopener" role="menuitem">
											<span class="site-dropdown__item-icon site-dropdown__item-icon--svg" aria-hidden="true">
												<?php include_asset('static/wpmailblox-icon.svg'); ?>
											</span>
											<span class="site-dropdown__item-body">
												<span class="site-dropdown__item-name">wp mailblox</span>
												<span class="site-dropdown__item-desc">Email builder for WordPress</span>
											</span>
										</a>
									</li>
									<li role="none">
										<a class="site-dropdown__item" href="https://wpclientflow.co.uk" target="_blank" rel="noopener" role="menuitem">
											<span class="site-dropdown__item-icon site-dropdown__item-icon--svg" aria-hidden="true">
												<?php include_asset('static/clientflow-icon.svg'); ?>
											</span>
											<span class="site-dropdown__item-body">
												<span class="site-dropdown__item-name">clientflow</span>
												<span class="site-dropdown__item-desc">Client &amp; project management for WordPress</span>
											</span>
										</a>
									</li>
								</ul>
							</li>

							<li><a class="site-menu__link" href="/#services">Services</a></li>
							<li><a class="site-menu__link" href="/#contact">Contact</a></li>

						</ul>
					</nav>

					<button class="hamburger" aria-label="Toggle navigation" aria-expanded="false" id="js-hamburger">
						<span class="hamburger__line"></span>
						<span class="hamburger__line"></span>
						<span class="hamburger__line"></span>
					</button>
				</div>

			</div>
		</div>
	</header> <!-- /.site-header -->

	<!-- Mobile nav overlay -->
	<nav class="site-nav--mobile" id="js-mobile-nav" aria-label="Mobile navigation" aria-hidden="true">
		<ul class="site-menu">

			<!-- Products accordion for mobile -->
			<li class="mobile-has-sub">
				<button class="site-menu__link js-mobile-sub-trigger" aria-expanded="false">
					Products
					<svg class="dropdown-chevron" aria-hidden="true" focusable="false" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</button>
				<ul class="mobile-sub" aria-hidden="true">
					<li>
						<a class="mobile-sub__link" href="https://wpmailblox.com" target="_blank" rel="noopener">
							wp mailblox
						</a>
					</li>
					<li>
						<a class="mobile-sub__link" href="https://wpclientflow.co.uk" target="_blank" rel="noopener">
							clientflow
						</a>
					</li>
				</ul>
			</li>

			<li><a class="site-menu__link" href="/#services">Services</a></li>
			<li><a class="site-menu__link" href="/#contact">Contact</a></li>

		</ul>
	</nav>

	<main id="maincontent" class="site-main" role="main">
