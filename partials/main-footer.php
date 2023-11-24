<footer class="site-footer text-white bg-darkgray uk-text-light">
	<div class="uk-container uk-container-expand">
		<div class="widget-wrapper uk-padding-large uk-padding-remove-horizontal">
			<a class="logo uk-display-inline-block" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AVAX logo', 'wpcanvas' ); ?>">
				<svg class="fill-white" width="179" height="80" role="img">
					<use xlink:href="#logo"></use>
				</svg>
			</a>

			<div class="uk-flex-between uk-margin-medium-top" uk-grid>
				<div class="uk-width-1-1 uk-width-auto@m">
					<div class="uk-grid-large" uk-grid>
						<div class="uk-width-1-1 uk-width-auto@s">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="uk-width-1-1 uk-width-auto@s">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
						<div class="uk-width-1-1 uk-width-auto@s">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1 uk-width-2-5@m uk-width-auto@xl">
					<div class="newsletter-wrapper">
						<h5 class="text-white uk-text-uppercase"><?php esc_html_e( 'Stay in touch', 'wpcanvas' ); ?></h5>
						<?php echo do_shortcode( '[yikes-mailchimp form="1"]' ); ?>
						<div class="uk-margin-large-top">
							<img width="600" height="76" class="" data-src="<?php echo esc_url( get_template_directory_uri() ) . '/library/img/espa-banner.png'; ?>" alt="<?php esc_attr_e( 'espa banner', 'wpcanvas' ); ?>" uk-img>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom text-white bg-black uk-text-small">
		<div class="uk-container uk-container-expand">
			<div class="policy-credits">
				<div class="credits">
					<p class="copyright uk-margin-remove">&copy; Avax A.E. <?php echo date( 'Y' ); ?></p>
					<span class="divider-circle uk-visible@m">•</span>
					<p class="uk-margin-remove">
						<a href="<?php echo esc_url( $privacy_policy ); ?>">
							<?php esc_html_e( 'Privacy Policy', 'wpcanvas' ); ?>
						</a>
					</p>
					<span class="divider-circle uk-visible@m">•</span>
					<p class="uk-margin-remove">
						<a href="<?php echo esc_url( $cookie_policy ); ?>">
							<?php esc_html_e( 'Cookie Policy', 'wpcanvas' ); ?>
						</a>
					</p>
				</div>
				<div class="credits">
					<p class="uk-margin-remove">
						Design by <a href="https://www.about.com.gr/" target="_blank">ABOUT: CREATIVE AGENCY</a>
					</p>
					<span class="divider-circle uk-visible@m">•</span>
					<p class="uk-margin-remove">
						Development by <a href="http://wearedoubledot.com/" target="_blank">Double Dot</a>
					</p>
				</div>
			</div>
			<div class="recaptcha">
				This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
			</div>
		</div>
	</div>


</footer>
