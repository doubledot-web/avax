<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$user_related_products = get_field( 'related_products' );
$type                  = 'product';
if ( ! empty( $user_related_products ) ) :
	$related_products = $user_related_products;
	$type             = 'post';
endif;

if ( $related_products ) : ?>
	<section class="related products uk-margin-large-top">
		<div class="uk-container uk-container-xlarge">
			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'You May Also Like', 'wpcanvas' ) );

			if ( $heading ) :
				?>
				<h2 class="font-weight-100 color-inherit uk-h1 uk-text-center uk-margin-medium-bottom">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>

			<div uk-slider>
				<div class="uk-position-relative">
					<div class="<?php echo esc_attr( set_product_slider_width( $related_products ) ); ?> uk-margin-auto-left uk-margin-auto-right uk-slider-container">
						<?php
						woocommerce_product_loop_start();
						foreach ( $related_products as $related_product ) :
							$post_object = 'product' === $type ? get_post( $related_product->get_id() ) : $related_product;
							setup_postdata( $GLOBALS['post'] =& $post_object );
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

wp_reset_postdata();
