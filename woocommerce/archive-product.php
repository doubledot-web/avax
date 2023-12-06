<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/*shop->is archive but without parent, term_id etc*/
if ( is_product_category() ) :
	$current_term        = get_queried_object();
	$current_term_parent = $current_term->parent;
	$outdoor_id          = 42;
	$sales_id            = 47;

	/*Check if top level categories*/
	if ( 0 === $current_term_parent && get_queried_object_id() !== $outdoor_id && get_queried_object_id() !== $sales_id ) :
		get_template_part( 'partials/archive-product', null, array( 'current_term' => $current_term ) );
		return;
	endif;
endif;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<div class="breadcrumbs-sorting-wrapper uk-flex uk-flex-middle uk-flex-between uk-margin-large-top uk-margin-bottom">
	<div>
		<?php woocommerce_breadcrumb(); ?>
		<div class="toggle-filters-wrapper uk-margin-top">
			<button class="btn-base btn-toggle-filters uk-text-uppercase uk-text-light uk-flex uk-flex-middle" type="button">
				<?php esc_html_e( 'Apply filters', 'wpcanvas' ); ?>
				<svg width="13" height="10" class="uk-margin-left" aria-hidden="true">
					<use xlink:href="#chevron-down-arrow"></use>
				</svg>
			</button>
		</div>
	</div>
	<div>
		<?php woocommerce_catalog_ordering(); ?>
	</div>
</div>
<div class="filters-wrapper uk-padding-large uk-padding-remove-horizontal uk-padding-remove-top">FILTERS GO HERE</div>


<?php

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
