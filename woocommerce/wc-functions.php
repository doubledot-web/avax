<?php
// Declare WooCommerce Support
function cnvs_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'cnvs_woocommerce_support' );


// Disable the default stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// Remove woocommerce things
function cnvs_remove_wc_stuff() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	//remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
	//remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
	//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10, 0 );
	//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15, 0 );
}
add_action( 'init', 'cnvs_remove_wc_stuff' );

// Change title
function woocommerce_template_loop_product_title() {
	echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . ' uk-h3 uk-text-light uk-margin-remove">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}


// Remove woocommerce breadcrumbs
function cnvs_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
// add_action( 'init', 'cnvs_remove_wc_breadcrumbs' );


// Remove checkout fields
function cnvs_override_checkout_fields( $fields ) {

	// unset( $fields['billing']['billing_first_name'] );
	// unset( $fields['billing']['billing_last_name'] );
	// unset( $fields['billing']['billing_company'] );
	// unset( $fields['billing']['billing_address_1'] );
	// unset( $fields['billing']['billing_address_2'] );
	// unset( $fields['billing']['billing_city'] );
	// unset( $fields['billing']['billing_postcode'] );
	// unset( $fields['billing']['billing_country'] );
	// unset( $fields['billing']['billing_state'] );
	// unset( $fields['billing']['billing_phone'] );
	// unset( $fields['order']['order_comments'] );
	// unset( $fields['billing']['billing_email'] );
	// unset( $fields['account']['account_username'] );
	// unset( $fields['account']['account_password'] );
	// unset( $fields['account']['account_password-2'] );

	return $fields;
}
// add_filter( 'woocommerce_checkout_fields', 'cnvs_override_checkout_fields' );


/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function cnvs_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'cnvs_hide_shipping_when_free_is_available', 100 );


// Change number of products on shop page
function uikit_loop_product_width_class() {
	switch ( wc_get_loop_prop( 'columns' ) ) :
		case 1:
			return 'uk-width-1-1';
			break;
		case 2:
			return 'uk-width-1-2';
			break;
		case 3:
			return 'uk-width-3-4 uk-width-1-2@s uk-width-1-3@l';
			break;
		case 5:
			return 'uk-width-1-2 uk-width-1-3@s uk-width-1-5@l';
			break;
		default:
			return 'uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l';
	endswitch;
}

// Add extra class for hover effect
function woocommerce_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="back-front-hover-effect woocommerce-LoopProduct-link woocommerce-loop-product__link uk-display-block">';
}

// Add second image on product hover
function cnvs_start_wrapper_div_print_second_product_img() {
	global $product;
	$product_gallery = $product->get_gallery_image_ids();
	echo '<div class="image-wrapper">';
	if ( ! empty( $product_gallery ) ) :
		echo wp_get_attachment_image(
			$product_gallery[0],
			'woocommerce_thumbnail',
			false,
			array(
				'class' => 'img-back uk-position-cover',
			)
		);
	endif;
}

function cnvs_close_wrapper_div_print_second_product_img() {
	echo '</div>';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'cnvs_start_wrapper_div_print_second_product_img', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'cnvs_close_wrapper_div_print_second_product_img', 11 );
