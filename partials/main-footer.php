<?php
$options_pages        = get_field( 'pages', 'option' );
$privacy_policy_page  = $options_pages['privacy_policy'];
$cookie_policy_page   = $options_pages['cookie_policy'];
$contact              = get_field( 'contact', 'option' );
$newsletter_shortcode = $contact['newsletter_shortcode'];
$footer_logos         = get_field( 'other', 'option' )['footer_logos'];
$pb_class             = ! empty( $footer_logos ) ? ' uk-padding-remove-bottom' : '';
?>

<footer class="site-footer text-white bg-darkgray uk-text-light">
	<div class="uk-container uk-container-expand">
		<div class="widget-wrapper uk-padding-large uk-padding-remove-horizontal<?php echo $pb_class; ?>">
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
						<div data-mooform-id="ed55d663-319a-4dd9-90bf-7bbf98fd37e3" ></div>
						<script>if(!window.mootrack){ !function(t,n,e,o,a){function d(t){var n=~~(Date.now()/3e5),o=document.createElement(e);o.async=!0,o.src=t+"?ts="+n;var a=document.getElementsByTagName(e)[0];a.parentNode.insertBefore(o,a)}t.MooTrackerObject=a,t[a]=t[a]||function(){return t[a].q?void t[a].q.push(arguments):void(t[a].q=[arguments])},window.attachEvent?window.attachEvent("onload",d.bind(this,o)):window.addEventListener("load",d.bind(this,o),!1)}(window,document,"script","https://cdn.stat-track.com/statics/moosend-tracking.min.js","mootrack"); } mootrack('loadForm', 'ed55d663319a4dd990bf7bbf98fd37e3');</script>
						<?php //echo do_shortcode( $newsletter_shortcode ); ?>
					</div>
				</div>
			</div>
		</div>

		<?php if ( ! empty( $footer_logos ) ) : ?>
			<ul class="footer-logos list-base uk-flex uk-flex-wrap uk-flex-middle uk-margin-medium-top uk-margin-large-bottom">
				<?php
				foreach ( $footer_logos as $logo ) :
					$logo_img = $logo['image'];
					$logo_url = $logo['url'];
					?>
					<li class="uk-margin-remove">
						<figure class="uk-margin-remove">
							<a class="uk-display-block" href="<?php echo esc_url( $logo_url ); ?>">
								<?php
								echo wp_get_attachment_image( $logo_img, 'full' );
								?>
							</a>
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<div class="footer-bottom text-white bg-black uk-text-small">
		<div class="uk-container uk-container-expand">
			<div class="policy-credits">
				<div class="credits">
					<p class="copyright uk-margin-remove">&copy; Avax A.E. <?php echo date( 'Y' ); ?></p>
					<span class="divider-circle uk-visible@m">•</span>
					<p class="uk-margin-remove">
						<a href="<?php echo esc_url( $privacy_policy_page ); ?>">
							<?php esc_html_e( 'Privacy Policy', 'wpcanvas' ); ?>
						</a>
					</p>
					<span class="divider-circle uk-visible@m">•</span>
					<p class="uk-margin-remove">
						<a href="<?php echo esc_url( $cookie_policy_page ); ?>">
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
