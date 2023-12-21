<?php
/**
 * CLEAN UP WordPress
 */
function cnvs_cleanup_wp() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );

	// wp version from css and js
	add_filter( 'style_loader_src', 'cnvs_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'cnvs_remove_wp_ver_css_js', 9999 );

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'cnvs_disable_emojicons_tinymce' );

	// disable WordPress auto oEmbed scripts
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'init', 'cnvs_cleanup_wp' );

// Disable automatic updates
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

function cnvs_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

function cnvs_disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
} // end of clean up



/**
 * ADD THEME SUPPORT AND THEME RELATED STUFF
 */
function cnvs_setup_theme() {
	/* https://codex.wordpress.org/Function_Reference/add_theme_support */
	add_theme_support( 'title-tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	// add_theme_support( 'automatic-feed-links' );
	// add_theme_support( 'post-formats', array() );
	// add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'meta', 'style', 'script' ) );
	add_theme_support( 'html5', array( 'gallery', 'caption', 'style', 'script' ) );

	$logo_defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);

	add_theme_support( 'custom-logo', $logo_defaults );

	// Register menus
	register_nav_menus(
		array(
			'main-nav'   => __( 'The Main Menu', 'wpcanvas' ),
			'mobile-nav' => __( 'The Mobile Menu', 'wpcanvas' ),
		)
	);

	load_theme_textdomain( 'wpcanvas', get_template_directory() . '/library/languages' );

	add_filter( 'the_content', 'cnvs_filter_ptags_on_images' );
}
add_action( 'after_setup_theme', 'cnvs_setup_theme' );

function cnvs_filter_ptags_on_images( $content ) {
	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}



/**
 * Adds ACF driven theme Options Page in dashboard
 */
function cnvs_theme_options() {
	if ( function_exists( 'acf_add_options_page' ) ) :
		acf_add_options_page(
			array(
				'page_title' => 'Theme Settings',
				'menu_title' => 'Theme Settings',
				'menu_slug'  => 'theme-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
				'icon_url'   => 'dashicons-layout',
				'position'   => '2.55',
			)
		);
	endif;
}
add_action( 'acf/init', 'cnvs_theme_options' );
// end theme support and theme related stuff



/**
 * Adds Google Maps API key on dashboard for ACF map component
 */
function cnvs_acf_init() {
	acf_update_setting( 'google_api_key', '***************************************' );
}
// add_action( 'acf/init', 'cnvs_acf_init' );



/**
 * INCLUDE FILES
 */
include_once get_theme_file_path( 'library/inc/body-classes.php' );
include_once get_theme_file_path( 'library/inc/class-mobile-submenu-wrapper.php' );
include_once get_theme_file_path( 'library/inc/class-submenu-wrapper.php' );
include_once get_theme_file_path( 'asides/register-sidebars.php' );
include_once get_theme_file_path( 'library/inc/shortcodes.php' );
include_once get_theme_file_path( 'library/inc/plugins-list.php' );
include_once get_theme_file_path( 'library/inc/utility-functions.php' );
include_once get_theme_file_path( 'library/inc/modify-main-query.php' );
if ( class_exists( 'WooCommerce' ) ) {
	include_once get_theme_file_path( 'woocommerce/wc-functions.php' );
}



/**
 * THUMBNAIL SIZES
 */
function cnvs_custom_image_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'thumb-600' => __( '600px by 150px' ),
		)
	);
}
// add_filter( 'image_size_names_choose', 'cnvs_custom_image_sizes' );
// add_image_size( 'thumb-600', 600, 150, true );



/**
 * SPECIFY WHICH SHORTCODES SHOULD NOT BE RUN THROUGH THE WPTEXTURIZE FUNCTION
 */
function cnvs_shortcodes_to_exempt_from_wptexturize( $shortcodes ) {
	$shortcodes[] = 'miniloop';
	return $shortcodes;
}
// add_filter( 'no_texturize_shortcodes', 'cnvs_shortcodes_to_exempt_from_wptexturize' );


/**
 * ADD IMAGE INSTRUCTIONS
 */
function add_featured_image_instruction( $content ) {
	global $post;
	$post_type = $post->post_type;
	if ( 'project' === $post_type ) :
		return $content .= '<p>Image dimensions should be 1200px x 595px.</p>';
	elseif ( 'post' === $post_type ) :
		return $content .= '<p>Image dimensions should be 660px x 856px.</p>';
	else :
		return $content;
	endif;
}
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction' );


/**
 * ENQUEUEING ADMIN SCRIPTS & STYLES
 */
function cnvs_admin_scripts_and_styles( $hook ) {
	$theme_uri = get_stylesheet_directory_uri();
	wp_enqueue_script( 'wpcanvas-admin', $theme_uri . '/library/js/admin-scripts-dist.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'wpcanvas-admin', $theme_uri . '/library/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'cnvs_admin_scripts_and_styles' );

/**
 * ENQUEUEING SCRIPTS & STYLES
 */
function cnvs_scripts_and_styles() {

	$theme_uri = get_stylesheet_directory_uri();
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Sora:wght@100;300;400;500;700&display=swap' );
	wp_enqueue_style( 'wpcanvas', $theme_uri . '/library/css/style.css' );
	wp_enqueue_script( 'uikit', $theme_uri . '/library/js/uikit-loader-dist.js', null, '', true );
	wp_enqueue_script( 'additional-libraries', $theme_uri . '/library/js/additional-libraries-dist.js', null, '', true );
	wp_register_script( 'wpcanvas', $theme_uri . '/library/js/scripts-dist.js', array( 'uikit', 'jquery' ), '', true );

	// wp_enqueue_script( 'google_maps_api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCkbBkvj33HXW2vcR-K8CfXnMoQaUItHN4', array(), '1' );

	// localize script to pass usefull variables to theme scripts
	// https://codex.wordpress.org/Function_Reference/wp_localize_script
	$global_vars = array(
		'admin_ajax'   => admin_url( 'admin-ajax.php' ),
		'site_url'     => get_bloginfo( 'site_url' ),
		'template_url' => get_template_directory_uri(),
	);
	wp_localize_script( 'wpcanvas', 'global_vars', $global_vars );
	wp_enqueue_script( 'wpcanvas' );

	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) === 1 ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cnvs_scripts_and_styles', 999 );



/**
 * ADD DEFER & ASYNC ATTRIBUTES TO WordPress SCRIPTS
 */
function dd_async_defer_attribute( $tag, $handle ) {
	if ( 'font-awesome' === $handle ) {
		$tag = str_replace( ' src', ' defer="defer" src', $tag );
	}

	return $tag;
}
// add_filter( 'script_loader_tag', 'dd_async_defer_attribute', 10, 2 );



/**
 * OEMBED SIZE OPTIONS
 */
if ( ! isset( $content_width ) ) {
	$content_width = 975;
}



/**
 * HIDE NAGS
 */
function hide_update_notice_to_all_but_admin_users() {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );



/**
 * A BETTER VAR_DUMP
 */
function ddump( ...$atts ) {
	echo '<pre>';
	var_dump( $atts );
	echo '</pre>';
}



/**
 * WPML LANGUAGE SWITCHER
 */
function language_selector_flags() {
	if ( class_exists( 'SitePress' ) ) {
		$languages = icl_get_languages( 'skip_missing=0&orderby=code' );

		if ( ! empty( $languages ) ) {
			foreach ( $languages as $language ) {
				if ( ! $language['active'] ) {
					echo '<a href="' . $language['url'] . '">';
				}

				echo '<img src="' . $language['country_flag_url'] . '" height="12" alt="' . $language['language_code'] . '" width="18" />';

				if ( ! $language['active'] ) {
					echo '</a>';
				}
			}
		}
	}
} // End WPML language switcher



/**
 * Adds UIkit classes to parent menu items
 *
 * @param array   $classes Array of the CSS classes that are applied to the menu item's <li> element
 * @param WP_Post $item    The current menu item
 *
 * @return array
 */
function cnvs_add_classes_to_parent_menu_items( $classes, $item ) {
	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$classes[] = 'uk-parent';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'cnvs_add_classes_to_parent_menu_items', 10, 2 );



/**
 * Sets the maximum number of words in a post excerpt
 *
 * @param int $length The maximum number of words. Default 55
 *
 * @return int
 */
function cnvs_excerpt_length( $length ) {
	return 55;
}
// add_filter( 'excerpt_length', 'cnvs_excerpt_length' );



/**
 * Replace default WordPress gallery shortcode
 */
function cnvs_gallery_content( $atts ) {
	ob_start();
	$img_ids = explode( ',', $atts['ids'] );
	$columns = isset( $atts['columns'] ) ? esc_attr( $atts['columns'] ) : '2';
	?>
	<div class="gallery uk-grid-medium uk-child-width-1-2@s uk-child-width-1-<?php echo $columns; ?>@m" uk-grid="masonry: true">
		<?php
		foreach ( $img_ids as $img_id ) :
			if ( wp_get_attachment_image( $img_id ) ) :
				?>
			<div>
				<a class="uk-inline" href="<?php echo wp_get_attachment_image_url( $img_id, 'full' ); ?>">
					<?php echo wp_get_attachment_image( $img_id, 'full' ); ?>
				</a>
			</div>
				<?php
			endif;
		endforeach;
		?>
	</div>
	<?php
	return ob_get_clean();
}

function cnvs_gallery_shortcode( $output = '', $atts = null, $instance = null ) {

	$cnvs_gallery = cnvs_gallery_content( $atts );

	if ( ! empty( $cnvs_gallery ) ) {
		return $cnvs_gallery;
	}

	return $output;
}
// add_filter( 'post_gallery', 'cnvs_gallery_shortcode', 10, 3 );



/**
 * RENDER RESPONSIVE AUTOEMBED YOUTUBE VIDEO
 */
function cnvs_custom_oembed_function( $cache, $url, $attr, $post_id ) {
	preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match );
	$youtube_id = $match[1];

	if ( ! $youtube_id ) {
		return wp_oembed_get( $url );
	}

	ob_start();
	?>

	<iframe src="https://www.youtube-nocookie.com/embed/<?php echo $youtube_id; ?>?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true; autoplay: false;"></iframe>

	<?php
	return ob_get_clean();
}
// add_filter( 'embed_oembed_html', 'cnvs_custom_oembed_function', 10, 4 );


/**
 * GET ALL POSTS
 */
function get_all_posts() {
	global $wp_query;
	return $wp_query->found_posts;
}


/**
 * GET ALL POSTS CURRENT PAGE
 */
function get_all_posts_current_page() {
	global $wp_query;
	return $wp_query->post_count;
}


/**
 * GET ALL BLOG PAGE URL
 */
function get_blog_page_url() {
	return get_permalink( get_option( 'page_for_posts' ) );
}


/**
 * ADD INSTRUCTIONS CONTENT IMAGE GRID SHORTCODE SINGLE POST
 */
function add_shortcode_instructions( $post ) {
	if ( 'post' === $post->post_type ) :
		echo '<p class="shortcode-instructions">
		<strong>Single Image:</strong> [image_grid ids="331"]: Image dimensions should be 1400px x xyz. <br>
		<strong>Double Equal Images:</strong> [image_grid ids="331, 327"]: Images should have the same dimensions (700px x xyz). <br>
		<strong>Three Images:</strong> [image_grid ids="331, 327, 328"]: The first image should be 1400px x xyz. The other two images should have the same dimensions (700px x xyz). <br>
		</p>
		';
	endif;
}
add_action( 'edit_form_after_title', 'add_shortcode_instructions' );

/**
 * GET TOTAL NUMBER OF WISHLIST PRODUCTS
 */
function yith_wcwl_ajax_update_count() {
	wp_send_json(
		array(
			'count' => yith_wcwl_count_products(),
		)
	);
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );


/**
 * GET PRODUCT CATEGORY WPML ID
 */
function get_product_cat_wpml_id( $id ) {
	//$outdoor_id= 42;
	//$sales_id= 47;
	return apply_filters( 'wpml_object_id', $id, 'product_cat', true );
}
