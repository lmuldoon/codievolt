<?php

/**
 * The home page template.
 */

global $meta;

$meta->title = 'Codievolt — Digital Products & Services';
$meta->description = 'Codievolt builds purposeful digital products and high-performance websites. Clean code. Sharp design. We also develop our own tools — including wp mailblox, the Gutenberg email builder for WordPress.';

get_header();

?>

<!-- =============================================
     HERO
============================================= -->
<div class="hero-wrapper">

	<div class="hero-blob hero-blob--1" aria-hidden="true"></div>
	<div class="hero-blob hero-blob--2" aria-hidden="true"></div>
	<div class="hero-blob hero-blob--3" aria-hidden="true"></div>

	<!-- Lightning bolt — right side -->
	<div class="hero-lightning hero-lightning--right" id="js-lightning-right" aria-hidden="true">
		<svg class="hero-lightning__svg" viewBox="0 0 460 900" xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="xMaxYMin meet">
			<defs>
				<filter id="bgs-r" x="-80%" y="-5%" width="260%" height="110%">
					<feGaussianBlur in="SourceGraphic" stdDeviation="12"/>
				</filter>
				<filter id="bgm-r" x="-40%" y="-5%" width="180%" height="110%">
					<feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur"/>
					<feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
				</filter>
			</defs>
			<g filter="url(#bgs-r)" opacity="0.55">
				<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="#7C3AED" stroke-width="7"/>
				<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="#7C3AED" stroke-width="4.5"/>
				<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="#438BFF" stroke-width="3.5"/>
			</g>
			<g filter="url(#bgm-r)" opacity="0.9">
				<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="#a78bfa" stroke-width="2.5"/>
				<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="#a78bfa" stroke-width="1.8" opacity="0.75"/>
				<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="#93c5fd" stroke-width="1.5" opacity="0.65"/>
				<path d="M 155 655 L 108 742 L 82 742 L 45 832" stroke="#a78bfa" stroke-width="1.2" opacity="0.5"/>
			</g>
			<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="rgba(255,255,255,0.88)" stroke-width="0.85"/>
			<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="rgba(255,255,255,0.55)" stroke-width="0.65"/>
			<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="rgba(255,255,255,0.45)" stroke-width="0.55"/>
		</svg>
	</div>

	<!-- Lightning bolt — left side (mirrored) -->
	<div class="hero-lightning hero-lightning--left" id="js-lightning-left" aria-hidden="true">
		<svg class="hero-lightning__svg" viewBox="0 0 460 900" xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="xMaxYMin meet">
			<defs>
				<filter id="bgs-l" x="-80%" y="-5%" width="260%" height="110%">
					<feGaussianBlur in="SourceGraphic" stdDeviation="12"/>
				</filter>
				<filter id="bgm-l" x="-40%" y="-5%" width="180%" height="110%">
					<feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur"/>
					<feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
				</filter>
			</defs>
			<g filter="url(#bgs-l)" opacity="0.55">
				<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="#7C3AED" stroke-width="7"/>
				<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="#7C3AED" stroke-width="4.5"/>
				<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="#438BFF" stroke-width="3.5"/>
			</g>
			<g filter="url(#bgm-l)" opacity="0.9">
				<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="#a78bfa" stroke-width="2.5"/>
				<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="#a78bfa" stroke-width="1.8" opacity="0.75"/>
				<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="#93c5fd" stroke-width="1.5" opacity="0.65"/>
				<path d="M 155 655 L 108 742 L 82 742 L 45 832" stroke="#a78bfa" stroke-width="1.2" opacity="0.5"/>
			</g>
			<path d="M 360 -20 L 275 205 L 328 205 L 225 425 L 278 425 L 155 655 L 208 655 L 105 905" stroke="rgba(255,255,255,0.88)" stroke-width="0.85"/>
			<path d="M 275 205 L 372 318 L 410 318 L 455 438" stroke="rgba(255,255,255,0.55)" stroke-width="0.65"/>
			<path d="M 225 425 L 152 515 L 122 515 L 72 618" stroke="rgba(255,255,255,0.45)" stroke-width="0.55"/>
		</svg>
	</div>

	<div class="hero hero--home">
		<div id="main-title" class="hero__content">
			<div class="hero__inner">
				<p class="hero__eyebrow">Digital Products &amp; Services</p>
				<h1>We craft <span class="hero__accent">digital</span><br>products &amp; sites<br>that last.</h1>
				<p class="hero__sub">Codievolt builds purposeful digital products and high-performance websites for businesses that want to stand out. Clean code. Sharp design. No compromise.</p>
				<div class="hero__actions">
					<a class="button button--primary" href="/#products">
						See our products
						<svg aria-hidden="true" focusable="false">
							<use href="#arrow" />
						</svg>
					</a>
					<a class="button button--outline" href="/#contact">
						Let's talk
						<svg aria-hidden="true" focusable="false">
							<use href="#arrow" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Marquee strip -->
	<div class="hero-marquee" aria-hidden="true">
		<div class="hero-marquee__track">
			<span class="hero-marquee__item">Web Design</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Web Build</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Web Hosting</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">WordPress</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">wp mailblox</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Digital Products</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">clientflow</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Clean Code</span>
			<span class="hero-marquee__sep">✦</span>
			<!-- Duplicate for seamless loop -->
			<span class="hero-marquee__item">Web Design</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Web Build</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Web Hosting</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">WordPress</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">wp mailblox</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Digital Products</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">clientflow</span>
			<span class="hero-marquee__sep">✦</span>
			<span class="hero-marquee__item">Clean Code</span>
			<span class="hero-marquee__sep">✦</span>
		</div>
	</div>

</div><!-- /.hero-wrapper -->

<article>

	<!-- =============================================
	     PRODUCTS
	============================================= -->
	<section class="section section--products" id="products">
		<div class="container">

			<div class="section-header text-center animated-up">
				<p class="section-eyebrow">Products</p>
				<h2>Tools we've built</h2>
				<p class="section-lead">We don't just build for clients — we build for ourselves too. These are the products we've shipped.</p>
			</div>

			<div class="products-grid animated-up">

				<!-- wp mailblox -->
				<a class="product-card" href="https://wpmailblox.com" target="_blank" rel="noopener">
					<div class="product-card__meta">
						<span class="product-card__type">WordPress Plugin</span>
					</div>
					<h3 class="product-card__name">wp mailblox</h3>
					<p class="product-card__desc">A Gutenberg-native email builder for WordPress. Design email-safe HTML templates, define brand Presets, and push directly to Mailchimp, Brevo, Klaviyo and more — without leaving WordPress.</p>
					<div class="product-card__footer">
						<span class="product-card__cta">Visit wpmailblox.com →</span>
					</div>
				</a>

				<!-- clientflow — coming soon -->
				<div class="product-card product-card--soon">
					<div class="product-card__meta">
						<span class="product-status product-status--soon">Coming soon</span>
						<span class="product-card__type">WordPress Plugin</span>
					</div>
					<h3 class="product-card__name">clientflow</h3>
					<p class="product-card__desc">A WordPress plugin for managing clients and projects. Proposals, invoices, file sharing and project timelines — built into WordPress, where your work already lives.</p>
					<div class="product-card__footer">
						<span class="product-card__cta product-card__cta--muted">In development</span>
					</div>
				</div>

			</div>

		</div>
	</section>

	<!-- =============================================
	     SERVICES
	============================================= -->
	<section class="section section--services" id="services">
		<div class="container">

			<div class="services-split">

				<div class="services-split__intro animated-up">
					<p class="section-eyebrow">What we do</p>
					<h2>Websites built properly,<br>from&nbsp;the&nbsp;ground&nbsp;up.</h2>
					<p>Every site is hand-coded for performance and optimised for search. No page builders, no bloated themes — just clean, purposeful work that holds up over time.</p>
					<a class="button button--primary" href="/#contact">
						Start a project
						<svg aria-hidden="true" focusable="false">
							<use href="#arrow" />
						</svg>
					</a>
				</div>

				<div class="services-split__capabilities animated-up">
					<div class="capability">
						<div class="capability__icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
						</div>
						<div class="capability__body">
							<h4>Custom Design</h4>
							<p>Every layout is designed specifically for your brand — not adapted from a template. Distinctive, intentional, and built to stand out.</p>
						</div>
					</div>
					<div class="capability">
						<div class="capability__icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
						</div>
						<div class="capability__body">
							<h4>Hand-coded &amp; Fast</h4>
							<p>Written from scratch. No bloated frameworks or drag-and-drop builders — just lean, performant code that loads quickly on every device.</p>
						</div>
					</div>
					<div class="capability">
						<div class="capability__icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
						</div>
						<div class="capability__body">
							<h4>SEO &amp; Accessibility</h4>
							<p>Semantic markup, proper heading structure, and accessible interactions from day one — so search engines and real people can both use your site.</p>
						</div>
					</div>
					<div class="capability">
						<div class="capability__icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
						</div>
						<div class="capability__body">
							<h4>Hosting &amp; Aftercare</h4>
							<p>We can host and maintain sites we've built. You get a single point of contact — the same people who built the site keep it running.</p>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>

	<!-- =============================================
	     CONTACT
	============================================= -->
	<section class="section section--contact" id="contact">
		<div class="container">

			<div class="contact-layout animated-up">

				<div class="contact-intro">
					<p class="section-eyebrow">Get in touch</p>
					<h2>Let's build something<br>together.</h2>
					<p>Whether you need a new website or want to ask about our products — we'd love to hear from you.</p>
					<ul class="contact-facts">
						<li>Working with clients worldwide</li>
						<li>No agency fluff — just honest work</li>
						<li>We reply within one business day</li>
					</ul>
				</div>

				<div class="contact-form-wrapper">
					<form class="contact-form js-contact-form" method="POST" action="/?q=contact-handler" novalidate>

						<!-- Honeypot — hidden from real users, bots fill it -->
						<div class="visually-hidden" aria-hidden="true">
							<label for="website">Website</label>
							<input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
						</div>

						<!-- reCAPTCHA v3 token injected by JS on submit -->
						<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

						<div class="form-field">
							<label class="form-field__label" for="contact-name">Your name <span aria-hidden="true">*</span></label>
							<input class="form-field__input" type="text" id="contact-name" name="name" required autocomplete="name" placeholder="Jane Smith">
						</div>

						<div class="form-field">
							<label class="form-field__label" for="contact-email">Email address <span aria-hidden="true">*</span></label>
							<input class="form-field__input" type="email" id="contact-email" name="email" required autocomplete="email" placeholder="jane@company.com">
						</div>

						<div class="form-field">
							<label class="form-field__label" for="contact-subject">What's it about?</label>
							<select class="form-field__input form-field__select" id="contact-subject" name="subject">
								<option value="">Select a topic</option>
								<option value="web-design">Web Design &amp; Build</option>
								<option value="wpmailblox">wp mailblox</option>
								<option value="other">Something else</option>
							</select>
						</div>

						<div class="form-field">
							<label class="form-field__label" for="contact-message">Message <span aria-hidden="true">*</span></label>
							<textarea class="form-field__input" id="contact-message" name="message" rows="5" required placeholder="Tell us about your project..."></textarea>
						</div>

						<button class="button button--primary form-submit" type="submit">
							Send message
							<svg aria-hidden="true" focusable="false">
								<use href="#arrow" />
							</svg>
						</button>

						<div class="form-status js-form-status" role="alert" aria-live="polite"></div>

					</form>
				</div>

			</div>

		</div>
	</section>

</article>

<?php get_footer(); ?>
