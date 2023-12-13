<?php
$current_term        = get_queried_object();
$current_term_id     = $current_term->term_id;
$current_term_tax    = $current_term->taxonomy;
$current_term_name   = $current_term->name;
$current_term_parent = $current_term->parent;
$current_page_url    = get_term_link( $current_term_id );
$brand_arg_slug      = 'brand';
$color_arg_slug      = 'color';


$terms_brands_array = array();
$terms_colors_array = array();

// get all products that have this category
$prods = wc_get_products(
	array(
		'limit'            => -1,
		'status'           => 'publish',
		'product_category' => $current_term_id,
	)
);

foreach ( $prods as $prod ) :
	$post_object = $prod->get_id();
	//ddump( $post_object );
	setup_postdata( $GLOBALS['post'] =& $post_object );
	$terms_brands = get_the_terms( $GLOBALS['post'], 'product_brand' );
	$terms_colors = get_the_terms( $GLOBALS['post'], 'pa_color' );
	if ( ! empty( $terms_brands ) ) :
		foreach ( $terms_brands as $brand ) :
			array_push( $terms_brands_array, $brand->name );
		endforeach;
	endif;

	if ( ! empty( $terms_colors ) ) :
		foreach ( $terms_colors as $color ) :
			array_push( $terms_colors_array, $color->name );
		endforeach;
	endif;

endforeach;
wp_reset_postdata();



//make values unique
$terms_brands_array_unique = array_unique( $terms_brands_array );
sort( $terms_brands_array_unique, SORT_NATURAL | SORT_FLAG_CASE );

$terms_colors_array_unique = array_unique( $terms_colors_array );
sort( $terms_colors_array_unique, SORT_NATURAL | SORT_FLAG_CASE );
?>

<ul class="uk-subnav uk-subnav-pill" uk-switcher>
	<li>
		<a class="uk-text-light" href="">
			<?php esc_html_e( 'Brand', 'wpcanvas' ); ?>
		</a>
	</li>
	<li>
		<a class="uk-text-light" href="">
			<?php esc_html_e( 'Collection', 'wpcanvas' ); ?>
		</a>
	</li>
	<li>
		<a class="uk-text-light" href="">
			<?php esc_html_e( 'Material', 'wpcanvas' ); ?>
		</a>
	</li>
</ul>
<ul class="uk-switcher uk-margin">
	<li class="uk-column-1-4">
		<?php
		foreach ( $terms_brands_array_unique as $brand_name ) :
			$brand        = get_term_by( 'name', $brand_name, 'product_brand' );
			$brand_id     = $brand->term_id;
			$brand_slug   = $brand->slug;
			$active_class = isset( $_GET[ $brand_arg_slug ] ) && $_GET[ $brand_arg_slug ] === $brand_slug ? ' active' : '';
			?>
		<div class="filter<?php echo esc_attr( $active_class ); ?>">
			<a class="filter-link text-black text-black-hover text-shadow-light-hover uk-text-light uk-text-uppercase" href="<?php echo esc_url( add_query_arg( $brand_arg_slug, $brand_slug ) ); ?>">
				<?php echo esc_html( $brand_name ); ?>
			</a>
		</div>
		<?php endforeach; ?>
	</li>
	<li></li>
	<li class="uk-column-1-4">
		<?php
		foreach ( $terms_colors_array_unique as $color_name ) :
			$color        = get_term_by( 'name', $color_name, 'pa_color' );
			$color_id     = $brand->term_id;
			$color_slug   = $brand->slug;
			$active_class = isset( $_GET[ $color_arg_slug ] ) && $_GET[ $color_arg_slug ] === $color_slug ? ' active' : '';
			?>
		<div class="filter<?php echo esc_attr( $active_class ); ?>">
			<a class="filter-link text-black text-black-hover text-shadow-light-hover uk-text-light uk-text-uppercase" href="<?php echo esc_url( add_query_arg( $color_arg_slug, $color_slug ) ); ?>">
				<?php echo esc_html( $color_name ); ?>
			</a>
		</div>
		<?php endforeach; ?>
	</li>
</ul>

