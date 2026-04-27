<?php

/**
 * 404 page.
 */

$meta->title = '404 — Page Not Found | Codievolt';
$meta->description = 'We couldn\'t find the page you were looking for.';

get_header();

?>

<article>

	<div class="not-found">

		<div class="hero-blob hero-blob--1" aria-hidden="true"></div>
		<div class="hero-blob hero-blob--2" aria-hidden="true"></div>

		<div class="not-found__inner">
			<p class="not-found__code">404</p>
			<h1 class="not-found__title">Page not found.</h1>
			<p class="not-found__sub">The page you're looking for doesn't exist or has been moved.</p>
			<a class="button button--primary" href="/">
				Back to home
				<svg aria-hidden="true" focusable="false">
					<use href="#arrow" />
				</svg>
			</a>
		</div>

	</div>

</article>

<?php get_footer(); ?>
