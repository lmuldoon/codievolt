import {
	throttle,
	debounce
} from "./__event-utilities";
import {
	gsap
} from "gsap";
import {
	ScrollTrigger
} from "gsap/ScrollTrigger";



export function initAnimations() {

	init();
	setUpHeader();
	setUpFooter();

	animateHero();
	animateElements();
	animateContactSection();
	initMagneticButtons();
	initLightningStrikes();

	$('html').removeClass('no-gsap').addClass('gsap');

}

function init() {
	gsap.registerPlugin(ScrollTrigger);

	gsap.config({
		nullTargetWarn: false,
		force3D: false
	});
	gsap.defaults({
		ease: "power2.out",
		duration: 0.75
	});

	ScrollTrigger.config({
		limitCallbacks: true,
	});

	// Refresh trigger points after page settle
	setTimeout(function () {
		ScrollTrigger.refresh();
	}, 1000);
}

function setUpHeader() {
	const $siteHeader = $('#js-site-header');

	function storeHeaderHeight() {
		$('html').css('--header-height', `${Math.ceil($siteHeader.outerHeight(true))}px`);
	}

	storeHeaderHeight();
	$(window).on('resize', debounce(storeHeaderHeight, 150));
	$(window).on('scroll', throttle(storeHeaderHeight, 100));
}

function setUpFooter() {
	const $siteFooter = $('.site-footer');

	function storeFooterHeight() {
		$('html').css('--footer-height', `${Math.ceil($siteFooter.outerHeight(true))}px`);
	}

	storeFooterHeight();
}


// ─── HERO ──────────────────────────────────────────────────────────────────────
// Word-by-word title reveal + eyebrow + subtitle + CTA

function animateHero() {
	const h1 = document.querySelector('.hero--home h1');
	const eyebrow = document.querySelector('.hero__eyebrow');
	const sub = document.querySelector('.hero__sub');
	const actions = document.querySelector('.hero__actions');

	// ── Split H1 into word spans ──────────────────────────────────────────────
	if (h1) {
		// Walk text nodes and element nodes separately to preserve .hero__accent span
		function wrapWords(node) {
			if (node.nodeType === Node.TEXT_NODE) {
				const words = node.textContent.split(/(\s+)/);
				const frag = document.createDocumentFragment();
				words.forEach(w => {
					if (!w.trim()) {
						frag.appendChild(document.createTextNode(w));
					} else {
						const outer = document.createElement('span');
						outer.className = 'hero-word';
						const inner = document.createElement('span');
						inner.className = 'hero-word__inner';
						inner.textContent = w;
						outer.appendChild(inner);
						frag.appendChild(outer);
					}
				});
				node.parentNode.replaceChild(frag, node);
			} else if (node.nodeType === Node.ELEMENT_NODE) {
				// Wrap .hero__accent children too
				Array.from(node.childNodes).forEach(wrapWords);
			}
		}

		Array.from(h1.childNodes).forEach(wrapWords);

		const wordInners = h1.querySelectorAll('.hero-word__inner');
		gsap.set(wordInners, { y: '115%' });

		gsap.to(wordInners, {
			y: '0%',
			stagger: 0.055,
			duration: 0.75,
			ease: 'power3.out',
			delay: 0.5
		});
	}

	// ── Eyebrow ───────────────────────────────────────────────────────────────
	if (eyebrow) {
		gsap.set(eyebrow, { opacity: 0, y: 18 });
		gsap.to(eyebrow, {
			opacity: 1,
			y: 0,
			duration: 0.6,
			ease: 'power2.out',
			delay: 0.25
		});
	}

	// ── Sub-heading ───────────────────────────────────────────────────────────
	if (sub) {
		gsap.set(sub, { opacity: 0, y: 22 });
		gsap.to(sub, {
			opacity: 1,
			y: 0,
			duration: 0.7,
			ease: 'power2.out',
			delay: 0.85
		});
	}

	// ── CTA buttons ───────────────────────────────────────────────────────────
	if (actions) {
		gsap.set(actions.children, { opacity: 0, y: 16 });
		gsap.to(actions.children, {
			opacity: 1,
			y: 0,
			stagger: 0.1,
			duration: 0.6,
			ease: 'power2.out',
			delay: 1.0
		});
	}

	// ── Header drop-in ────────────────────────────────────────────────────────
	const headerInner = document.querySelector('.js-site-header .site-header__inner');
	if (headerInner) {
		gsap.from(headerInner, {
			y: -40,
			opacity: 0,
			duration: 0.9,
			ease: 'power2.out',
			delay: 0.1
		});
	}
}


// ─── SCROLL REVEAL ─────────────────────────────────────────────────────────────

function animateElements() {

	// ── .animated — horizontal slide-in ─────────────────────────────────────
	gsap.utils.toArray(".animated").forEach((elem) => {
		gsap.set(elem.children, { opacity: 0 });

		ScrollTrigger.create({
			trigger: elem,
			start: "top 90%",
			once: true,
			onEnter: () => {
				gsap.fromTo(
					elem.children,
					{ x: 40, opacity: 0 },
					{ x: 0, opacity: 1, stagger: 0.1, duration: 0.7, ease: 'power2.out', clearProps: "transform, opacity" }
				);
			},
			onEnterBack: () => {
				gsap.to(elem.children, { duration: 0.3, opacity: 1, stagger: 0.05 });
			}
		});
	});

	// ── .animated-up — upward fade-in, staggered children ───────────────────
	gsap.utils.toArray(".animated-up").forEach((elem) => {
		const children = elem.children;

		ScrollTrigger.create({
			trigger: elem,
			start: "top 88%",
			once: true,
			immediateRender: false,
			onEnter: () => {
				gsap.fromTo(children,
					{ y: 40, opacity: 0 },
					{
						y: 0, opacity: 1,
						stagger: 0.12,
						duration: 0.75,
						ease: "power3.out",
						clearProps: "transform, opacity"
					}
				);
			},
			onEnterBack: () => {
				gsap.to(children, { opacity: 1, duration: 0.3, stagger: 0.05 });
			}
		});
	});
}


// ─── CONTACT SECTION ───────────────────────────────────────────────────────────

function animateContactSection() {
	const layout = document.querySelector('.contact-layout');
	if (!layout) return;

	const [intro, formWrapper] = layout.children;
	if (!intro || !formWrapper) return;

	gsap.set([intro, formWrapper], { opacity: 0, y: 45 });

	ScrollTrigger.create({
		trigger: layout,
		start: 'top 80%',
		once: true,
		onEnter: () => {
			gsap.to(intro, {
				opacity: 1, y: 0,
				duration: 0.8, ease: 'power3.out'
			});
			gsap.to(formWrapper, {
				opacity: 1, y: 0,
				duration: 0.8, ease: 'power3.out',
				delay: 0.12
			});
		}
	});
}


// ─── MAGNETIC BUTTONS ──────────────────────────────────────────────────────────

function initMagneticButtons() {
	const buttons = document.querySelectorAll('.button--primary');

	buttons.forEach(btn => {
		btn.addEventListener('mousemove', (e) => {
			const rect = btn.getBoundingClientRect();
			const cx = rect.left + rect.width / 2;
			const cy = rect.top + rect.height / 2;
			const dx = e.clientX - cx;
			const dy = e.clientY - cy;

			gsap.to(btn, {
				x: dx * 0.18,
				y: dy * 0.18,
				duration: 0.35,
				ease: 'power2.out'
			});
		});

		btn.addEventListener('mouseleave', () => {
			gsap.to(btn, {
				x: 0, y: 0,
				duration: 0.6,
				ease: 'elastic.out(1, 0.55)'
			});
		});
	});
}


// ─── LIGHTNING STRIKES ─────────────────────────────────────────────────────────

function initLightningStrikes() {
	const rightEl = document.getElementById('js-lightning-right');
	const leftEl  = document.getElementById('js-lightning-left');
	if (!rightEl || !leftEl) return;

	// Only run on lg+ (bolts are display:none below that breakpoint)
	if (window.matchMedia('(max-width: 1023px)').matches) return;

	let nextSide = 0; // 0 = right, 1 = left

	function strike(el, onComplete) {
		const tl = gsap.timeline({ onComplete });

		// Instant flash to full brightness
		tl.set(el, { opacity: 1 })
		// Return stroke 1 — brief dark, then bright again
		  .to(el, { opacity: 0.08, duration: 0.06, ease: 'none' })
		  .to(el, { opacity: 0.95, duration: 0.05, ease: 'none' })
		// Return stroke 2 — dimmer
		  .to(el, { opacity: 0.06, duration: 0.09, ease: 'none' })
		  .to(el, { opacity: 0.72, duration: 0.07, ease: 'none' })
		// Return stroke 3 — dimmer still
		  .to(el, { opacity: 0.04, duration: 0.11, ease: 'none' })
		  .to(el, { opacity: 0.48, duration: 0.08, ease: 'none' })
		// Hold at low glow, then bleed out slowly
		  .to(el, { opacity: 0.18, duration: 0.8, ease: 'power1.out', delay: 0.3 })
		  .to(el, { opacity: 0, duration: 3.5, ease: 'power1.in' });
	}

	function runLoop() {
		const el = nextSide === 0 ? rightEl : leftEl;
		nextSide = 1 - nextSide;

		strike(el, () => {
			// Random pause before the opposite side fires
			gsap.delayedCall(gsap.utils.random(2.5, 5.5), runLoop);
		});
	}

	// First strike fires after hero text has settled
	gsap.delayedCall(2, runLoop);
}


export function refreshAnimations() {
	ScrollTrigger.refresh();
}
