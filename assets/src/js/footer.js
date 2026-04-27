import {
	debounce,
	throttle
} from "./scripts/__event-utilities";
import 'iconify-icon';
import Iconify from '@iconify/iconify';

import {
	HeaderStateController
} from './scripts/header-collapse';
HeaderStateController.init();

import {
	MenuController
} from './scripts/nav-toggle';
MenuController.init();

import {
	initAnimations
} from './scripts/animations';
initAnimations();

// ─── SETUP ────────────────────────────────────────────────────────────────────

let $siteHeader = $('.site-header');
let $mainTitle = $('#main-title');

jQuery(document).ready(() => {
	storeHeaderAndFooterHeight();
});

function storeHeaderAndFooterHeight() {
	$('body').css('--header-height', $siteHeader.outerHeight(false));
	$('body').css('--main-title-height', $mainTitle.outerHeight(false));
}

$(window).on('resize', debounce(function () {
	storeHeaderAndFooterHeight();
}, 150));

$(window).on('scroll', debounce(function () {
	storeHeaderAndFooterHeight();
}, 100));


// ─── SMOOTH SCROLL ────────────────────────────────────────────────────────────

(function ($) {
	$('a[href*="#"]')
		.not('[href="#"]')
		.not('[href="#0"]')
		.not('[role="tab"]')
		.on('click', function (event) {
			if (
				location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
				location.hostname === this.hostname
			) {
				let target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

				if (!target.length) return;

				event.preventDefault();

				const $header = $('.js-site-header');

				$header.addClass('is-measuring');
				$header.attr('data-state', 'collapsed');
				void $header[0].offsetHeight;
				const headerHeight = Math.ceil($header.outerHeight(true));
				$header.removeClass('is-measuring');

				$('html, body').animate({
					scrollTop: target.offset().top - headerHeight + 1
				}, 400, function () {
					const heading = $(target[0]).find('h2').get(0);
					if (!heading) return;
					heading.focus({ preventScroll: true });
					if (heading !== document.activeElement) {
						heading.setAttribute('tabindex', '-1');
						heading.focus({ preventScroll: true });
					}
				});
			}
		});
})(jQuery);


// ─── CONTACT FORM ─────────────────────────────────────────────────────────────

(function ($) {
	const $form = $('.js-contact-form');
	if (!$form.length) return;

	const SITE_KEY = '6LcHo80sAAAAAGevrlghKLg-U_wScxNdCSrw3xNJ';

	$form.on('submit', function (e) {
		e.preventDefault();

		const $status = $form.find('.js-form-status');
		const $btn = $form.find('.form-submit');

		$status.removeClass('is-success is-error').text('').hide();
		$btn.prop('disabled', true).text('Sending…');

		function doSubmit(token) {
			$('#g-recaptcha-response').val(token || '');

			$.ajax({
				url: $form.attr('action'),
				method: 'POST',
				data: $form.serialize(),
				dataType: 'json',
				headers: { 'X-Requested-With': 'XMLHttpRequest' },
			})
			.done(function (res) {
				if (res.success) {
					$status.addClass('is-success').text('Thanks! We\'ll be in touch shortly.').show();
					$form[0].reset();
				} else {
					const msg = (res.errors && res.errors.length)
						? res.errors.join(' ')
						: 'Something went wrong. Please try again.';
					$status.addClass('is-error').text(msg).show();
				}
			})
			.fail(function (xhr) {
				const res = xhr.responseJSON;
				const msg = (res && res.errors && res.errors.length)
					? res.errors.join(' ')
					: 'Something went wrong. Please try again.';
				$status.addClass('is-error').text(msg).show();
			})
			.always(function () {
				$btn.prop('disabled', false).html('Send message <svg aria-hidden="true" focusable="false"><use href="#arrow"/></svg>');
			});
		}

		// Execute reCAPTCHA v3 then submit
		if (typeof grecaptcha !== 'undefined') {
			grecaptcha.ready(function () {
				grecaptcha.execute(SITE_KEY, { action: 'contact' }).then(function (token) {
					doSubmit(token);
				}).catch(function () {
					// reCAPTCHA failed — submit without token (server will reject)
					doSubmit('');
				});
			});
		} else {
			// Script not loaded (e.g. local dev) — submit directly
			doSubmit('');
		}
	});
})(jQuery);
