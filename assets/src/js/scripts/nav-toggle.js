import { gsap } from 'gsap';
import {
	disableBodyScroll,
	enableBodyScroll
} from 'body-scroll-lock';

let isOpen = false;
let isAnimating = false;

function init() {
	const $hamburger = $('#js-hamburger');

	$hamburger.on('click', function () {
		if (isAnimating) return;
		isOpen ? closeMenu() : openMenu();
	});

	// Close on Escape key
	$(document).on('keydown', function (e) {
		if (e.key === 'Escape' && isOpen) closeMenu();
	});

	// Close when any link inside the mobile nav is clicked
	$(document).on('click', '#js-mobile-nav a', function () {
		if (isOpen) closeMenu();
	});

	initDropdown();
	initMobileSubMenus();
}

function openMenu() {
	isAnimating = true;
	isOpen = true;

	const $hamburger = $('#js-hamburger');
	const $nav = $('#js-mobile-nav');
	const $items = $('#js-mobile-nav .site-menu > li');

	$hamburger.addClass('is-active').attr('aria-expanded', 'true');
	$nav.attr('aria-hidden', 'false');
	disableBodyScroll($nav[0], { reserveScrollBarGap: true });

	gsap.set($nav[0], { visibility: 'visible', pointerEvents: 'auto' });
	gsap.set($items, { opacity: 0, x: -24 });

	const tl = gsap.timeline({
		onComplete: () => { isAnimating = false; }
	});

	tl.to($nav[0], {
		opacity: 1,
		duration: 0.3,
		ease: 'power2.out'
	});

	tl.to($items, {
		opacity: 1,
		x: 0,
		stagger: 0.07,
		duration: 0.45,
		ease: 'power3.out',
		clearProps: 'x'
	}, '-=0.15');
}

function closeMenu() {
	isAnimating = true;
	isOpen = false;

	const $hamburger = $('#js-hamburger');
	const $nav = $('#js-mobile-nav');
	const $items = $('#js-mobile-nav .site-menu > li');

	$hamburger.removeClass('is-active').attr('aria-expanded', 'false');
	$nav.attr('aria-hidden', 'true');
	enableBodyScroll($nav[0]);

	// Close any open mobile sub-menus
	$('.js-mobile-sub-trigger[aria-expanded="true"]').each(function () {
		const $sub = $(this).next('.mobile-sub');
		$sub.removeClass('is-open').attr('aria-hidden', 'true');
		$(this).attr('aria-expanded', 'false');
	});

	const tl = gsap.timeline({
		onComplete: () => {
			isAnimating = false;
			gsap.set($nav[0], { visibility: 'hidden', pointerEvents: 'none' });
		}
	});

	tl.to($items, {
		opacity: 0,
		x: -16,
		stagger: { each: 0.04, from: 'end' },
		duration: 0.25,
		ease: 'power2.in'
	});

	tl.to($nav[0], {
		opacity: 0,
		duration: 0.2,
		ease: 'power2.in'
	}, '-=0.1');
}


// ─── DESKTOP DROPDOWN ──────────────────────────────────────────────────────────

function initDropdown() {
	const $triggers = $('.has-dropdown');

	$triggers.each(function () {
		const $wrap = $(this);
		const $trigger = $wrap.find('.site-menu__dropdown-trigger');
		const $dropdown = $wrap.find('.site-dropdown');

		let closeTimer = null;

		function showDropdown() {
			if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }

			$trigger.attr('aria-expanded', 'true');
			$dropdown.css({ visibility: 'visible', pointerEvents: 'auto' });

			gsap.fromTo($dropdown[0],
				{ opacity: 0, y: -8 },
				{ opacity: 1, y: 0, duration: 0.22, ease: 'power2.out' }
			);
		}

		function hideDropdown() {
			closeTimer = setTimeout(() => {
				$trigger.attr('aria-expanded', 'false');

				gsap.to($dropdown[0], {
					opacity: 0,
					y: -6,
					duration: 0.18,
					ease: 'power2.in',
					onComplete: () => {
						$dropdown.css({ visibility: 'hidden', pointerEvents: 'none' });
					}
				});
			}, 80);
		}

		$wrap.on('mouseenter', showDropdown);
		$wrap.on('mouseleave', hideDropdown);

		// Keep open while hovering dropdown itself
		$dropdown.on('mouseenter', function () {
			if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
		});

		// Keyboard: show on focus of trigger button
		$trigger.on('focus', showDropdown);

		// Close when focus leaves the whole dropdown group
		$dropdown.on('focusout', function (e) {
			if (!$wrap[0].contains(e.relatedTarget)) {
				hideDropdown();
			}
		});

		$trigger.on('focusout', function (e) {
			if (!$wrap[0].contains(e.relatedTarget)) {
				hideDropdown();
			}
		});
	});

	// Close all dropdowns on Escape
	$(document).on('keydown', function (e) {
		if (e.key === 'Escape') {
			$('.has-dropdown .site-menu__dropdown-trigger').attr('aria-expanded', 'false');
			$('.site-dropdown').css({ visibility: 'hidden', pointerEvents: 'none', opacity: 0 });
		}
	});
}


// ─── MOBILE PRODUCT SUB-MENUS ─────────────────────────────────────────────────

function initMobileSubMenus() {
	$(document).on('click', '.js-mobile-sub-trigger', function () {
		const $trigger = $(this);
		const $sub = $trigger.next('.mobile-sub');
		const isExpanded = $trigger.attr('aria-expanded') === 'true';

		$trigger.attr('aria-expanded', isExpanded ? 'false' : 'true');
		$sub.toggleClass('is-open', !isExpanded).attr('aria-hidden', isExpanded ? 'true' : 'false');
	});
}


export const MenuController = {
	init,
	openMenu,
	closeMenu
};
