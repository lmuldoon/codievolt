<?php

/**
 * Site configuration — SECRET KEYS.
 *
 * This file is git-ignored. Do not commit it.
 *
 * SETUP:
 *   1. Go to https://www.google.com/recaptcha/admin and register your domain.
 *      Select reCAPTCHA v3. Copy the site key and secret key below.
 *
 *   2. Replace YOUR_RECAPTCHA_SITE_KEY in:
 *      - template-parts/header.php  (the api.js script src)
 *      - assets/src/js/footer.js    (the SITE_KEY constant)
 *
 *   3. Set CONTACT_EMAIL to wherever form submissions should go.
 */

define('RECAPTCHA_SECRET', '6LcHo80sAAAAAGyOp8pd4DwwnxZWLzfvtgLjWXla');
define('CONTACT_EMAIL',    'info@codievolt.com');
