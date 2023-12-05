<?php
$args          = array(
	'hide_empty' => false,
);
$brands        = get_terms( 'product_brand', $args );
$options_pages = get_field( 'pages', 'option' );
$brands_page   = $options_pages['brands'];
?>

<section class="section section-brands uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
			<?php esc_html_e( 'Brands', 'wpcanvas' ); ?>
		</h2>

		<div uk-slider="sets: true΄autoplay: true">
			<div class="uk-position-relative">
				<div class="uk-width-5-6 uk-margin-auto-left uk-margin-auto-right uk-slider-container">
					<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-large uk-grid">
						<?php
						foreach ( $brands as $brand ) :
							$brand_id      = $brand->term_id;
							$acf_term      = 'product_brand_' . $brand_id;
							$brand_logo_id = get_field( 'logo', $acf_term );
							$related_page  = get_field( 'related_page', $acf_term );
							?>
							<li>
								<figure class="uk-margin-remove uk-text-center">
									<a class="uk-display-block" href="<?php echo esc_url( $related_page ); ?>">
										<?php
										echo wp_get_attachment_image( $brand_logo_id, 'full' );
										?>
									</a>
								</figure>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php
				get_template_part(
					'partials/slider-arrows-centered',
					null,
					array(
						'label_prev' => __( 'Previous set of brands', 'wpcanvas' ),
						'label_next' => __( 'Next set of brands', 'wpcanvas' ),
					)
				);
				?>
			</div>
		</div>

		<div class="uk-margin-large-top uk-text-center">
			<a href="<?php echo esc_url( $brands_page ); ?>" class="uk-button uk-button-default">
				<?php esc_html_e( 'View All', 'wpcanvas' ); ?>
			</a>
		</div>
	</div>
</section>
