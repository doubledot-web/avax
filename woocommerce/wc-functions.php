<?php
// Declare WooCommerce Support
function cnvs_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	/*array(
			'gallery_thumbnail_image_width' => 250,
	);*/

	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'cnvs_woocommerce_support' );


// Disable the default stylesheet
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


// Remove woocommerce things
function cnvs_remove_wc_stuff() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	//remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20 );
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
	if ( is_singular( array( 'product', 'project' ) ) || is_page_template( 'page-templates/brand.php' ) ) :
		return 'uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l';
	endif;

	switch ( wc_get_loop_prop( 'columns' ) ) :
		case 1:
			return 'uk-width-1-1';
			break;
		case 2:
			return 'uk-width-1-2@s';
			break;
		case 3:
			return 'uk-width-1-2@s uk-width-1-3@m';
			break;
		case 5:
			return 'uk-width-1-2@s uk-width-1-3@m uk-width-1-5@l';
			break;
		default:
			return 'uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l';
	endswitch;
}

// Add extra class for hover effect
function woocommerce_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="back-front-hover-effect text-shadow-hover woocommerce-LoopProduct-link woocommerce-loop-product__link uk-display-block">';
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


// Override default breadcrumbs
function woocommerce_breadcrumb( $args = array() ) {
	$args = wp_parse_args(
		$args,
		apply_filters(
			'woocommerce_breadcrumb_defaults',
			array(
				'delimiter'   => '&nbsp;&gt;&nbsp;',
				'wrap_before' => '<nav class="woocommerce-breadcrumb uk-text-light" aria-label="Breadcrumb">',
				'wrap_after'  => '</nav>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Shop', 'breadcrumb', 'woocommerce' ),
			)
		)
	);

	$breadcrumbs = new WC_Breadcrumb();

	if ( ! empty( $args['home'] ) ) {
		$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', null ) );
	}

	$args['breadcrumb'] = $breadcrumbs->generate();

	/**
	 * WooCommerce Breadcrumb hook
	 *
	 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
	 */
	do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

	wc_get_template( 'global/breadcrumb.php', $args );
}

// Add extra disabled sorting option
function customize_sorting_options( $options ) {
	unset( $options['popularity'] );
	unset( $options['rating'] );
	$options['date']       = __( 'Newest to Oldest', 'wpcanvas' );
	$options['price']      = __( 'Price Ascending', 'wpcanvas' );
	$options['price-desc'] = __( 'Price Descending', 'wpcanvas' );

	return $options;
}
add_filter( 'woocommerce_catalog_orderby', 'customize_sorting_options' );

// Set product slider width based on number of products
function set_product_slider_width( $prods ) {
	$col_class       = '';
	$number_of_prods = count( $prods );
	if ( $number_of_prods > 4 ) :
		$col_class = 'uk-width-5-6';
	else :
		if ( 3 === $number_of_prods ) :
			$col_class = 'uk-width-5-6 uk-width-1-1@m';
		elseif ( 2 === $number_of_prods ) :
			$col_class = 'uk-width-5-6 uk-width-1-1@s';
		elseif ( 1 === $number_of_prods ) :
			$col_class = 'uk-width-1-1';
		endif;
	endif;

	return $col_class;
}

// Change number of related products to 4
function set_number_of_related_products_to_four( $args ) {
	$args['posts_per_page'] = 4;

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'set_number_of_related_products_to_four' );

// show on mobile only dots
function customize_product_gallery_options( $options ) {
	$options['controlNav'] = wp_is_mobile() == $options['controlNav'] ? true : 'thumbnails';

	return $options;
}
add_filter( 'woocommerce_single_product_carousel_options', 'customize_product_gallery_options' );

// Add extra margin
function woocommerce_single_variation() {
	echo '<div class="woocommerce-variation single_variation uk-margin-bottom"></div>';
}

// Change thumbnail image size width to show the full image
function customize_gallery_thumbnail_size( $size ) {
	/*check wc-product-functions.php*/
	/*$gallery_thumbnail_size           = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
	*/
	/*return full image*/
	return 'full';
}
add_filter( 'woocommerce_gallery_thumbnail_size', 'customize_gallery_thumbnail_size' );

