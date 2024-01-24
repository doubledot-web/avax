<?php
$related_brand = get_field( 'related_brand' );
$prods         = get_field( 'related_products' );
$type          = 'post';
if ( empty( $prods ) ) :
	$prods = wc_get_products(
		array(
			'limit'  => 4,
			'status' => 'publish',
			'brand'  => $related_brand->slug,
		)
	);
	$type  = 'product';
endif;
//pass set_product_slider_width($prods);
?>

<section class="section section-related-products uk-margin-large-top">
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
						$post_object = 'product' === $type ? get_post( $prod->get_id() ) : $prod;
						setup_postdata( $GLOBALS['post'] = $post_object );
						wc_get_template_part( 'content', 'product' );
					endforeach;
					woocommerce_product_loop_end();
					wp_reset_postdata();
					?>
				</div>
				<?php get_template_part( 'partials/slider-arrows-centered' ); ?>
			</div>
		</div>

		<div class="uk-text-center uk-margin-large-top">
			<a class="uk-button uk-button-default uk-margin-auto-left uk-margin-auto-right" href="<?php echo esc_url( get_term_link( $related_brand->term_id ) ); ?>">
				<?php esc_html_e( 'view all products', 'wpcanvas' ); ?>
			</a>
		</div>
	</div>
</section>
