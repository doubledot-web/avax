<?php
$prods = get_field( 'related_products' );
//pass set_product_slider_width($prods);

if ( ! empty( $prods ) ) :
	?>
	<section class="section section-related-products uk-margin-large-bottom">
		<div class="uk-container uk-container-xlarge">
			<h2 class="font-weight-100 uk-h1 uk-text-center">
				<?php esc_html_e( 'Featured Products', 'wpcanvas' ); ?>
			</h2>

			<div uk-slider>
				<div class="uk-position-relative">
					<div class="<?php echo esc_attr( set_product_slider_width( $prods ) ); ?> uk-margin-auto-left uk-margin-auto-right uk-slider-container">
						<?php
						woocommerce_product_loop_start();
						foreach ( $prods as $prod ) :
							setup_postdata( $GLOBALS['post'] = $prod );
							wc_get_template_part( 'content', 'product' );
						endforeach;
						woocommerce_product_loop_end();
						wp_reset_postdata();
						?>
					</div>
					<?php get_template_part( 'partials/slider-arrows-centered' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php
endif;
