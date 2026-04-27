<?php

/**
 * The footer of the site.
 */

global $meta;

?>


</main> <!-- /.site-main -->

	<footer class="site-footer" role="contentinfo">
		<div class="container">

			<div class="site-footer__upper animated-up">

				<!-- Brand -->
				<div class="site-footer__brand">
					<a href="/" aria-label="Codievolt home">
						<?php include_asset('static/logo.svg'); ?>
					</a>
					<p class="site-footer__tagline">Digital products &amp; services.</p>
				</div>

				<!-- Company links -->
				<div class="site-footer__nav-col">
					<h4>Company</h4>
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/#services">Services</a></li>
						<li><a href="/#contact">Contact</a></li>
						<li><a href="/terms-privacy">Terms &amp; Privacy</a></li>
					</ul>
				</div>

				<!-- Products + connect -->
				<div class="site-footer__nav-col">
					<h4>Products</h4>
					<ul>
						<li>
							<a href="https://wpmailblox.com" target="_blank" rel="noopener">wp mailblox</a>
						</li>
						<li>
							<span style="color: rgba(255,255,255,0.3); cursor: default;">
								clientflow <span class="footer-soon">Soon</span>
							</span>
						</li>
					</ul>

					<div class="footer-social" aria-label="Social links">
						<a href="mailto:info@codievolt.com" aria-label="Email us">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
						</a>
						<a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
						</a>
						<a href="https://x.com" target="_blank" rel="noopener" aria-label="X / Twitter">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.26 5.632L18.245 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
						</a>
					</div>
				</div>

			</div>

			<div class="site-footer__bottom">
				<p class="site-footer__copy">&copy; <?php echo date('Y'); ?> Codievolt. All rights reserved.</p>
				<div class="site-footer__legal">
					<a href="/terms-privacy">Terms &amp; Privacy</a>
				</div>
			</div>

		</div>
	</footer> <!-- /.site-footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/<?php echo get_revision('footer.js'); ?>"></script>
</body>

</html>
