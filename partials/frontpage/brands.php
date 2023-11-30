<?php
$args          = array(
	'hide_empty' => false,
);
$brands        = get_terms( 'product_brand', $args );
$options_pages = get_field( 'pages', 'option' );
$brands_page   = $options_pages['brands'];
?>

<section class="section section-brands uk-margin-large-bottom">
	<div class="max-width-1600 uk-container">
		<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
			<?php esc_html_e( 'Brands', 'wpcanvas' ); ?>
		</h2>
		<div uk-slider="sets: true">
			<div class="uk-position-relative">
				<div class="uk-slider-container">
					<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-medium uk-grid">
						<?php
						foreach ( $brands as $brand ) :
							$brand_id      = $brand->term_id;
							$acf_term      = 'product_brand_' . $brand_id;
							$brand_logo_id = get_field( 'logo', $acf_term );
							?>
							<li>
								<figure class="uk-margin-remove uk-text-center">
									<?php
									echo wp_get_attachment_image( $brand_logo_id, 'full' );
									?>
								</figure>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="slider-arrows">
					<a class="slider-prev uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous" aria-label="<?php esc_attr_e( 'Previous Image', 'wpcanvas' ); ?>">
						<svg width="14" height="24" aria-hidden="true">
							<use xlink:href="#slider-prev-arrow"></use>
						</svg>
					</a>
					<a class="slider-next uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next" aria-label="<?php esc_attr_e( 'Next Image', 'wpcanvas' ); ?>">
						<svg width="14" height="24" aria-hidden="true">
							<use xlink:href="#slider-next-arrow"></use>
						</svg>
					</a>
				</div>
			</div>

		</div>
		<div class="uk-margin-large-top uk-text-center">
			<a href="<?php echo esc_url( $brands_page ); ?>" class="uk-button uk-button-default">
				<?php esc_html_e( 'View All', 'wpcanvas' ); ?>
			</a>
		</div>
	</div>
</section>
