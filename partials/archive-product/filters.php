<?php
$current_term    = $args['current_term'];
$current_term_id = $current_term->term_id;

$tax_brand      = 'product_brand';
$tax_collection = 'product_collection';
$tax_material   = 'pa_material';

//
$terms_brands_array      = array();
$terms_collections_array = array();
$terms_materials_array   = array();

// get all products that have this category
// extra will handle additional paramaters
$prods = wc_get_products(
	array(
		'limit'            => -1,
		'status'           => 'publish',
		'product_category' => $current_term_id,
		'extra'            => $_GET,
	)
);

// loop through products
foreach ( $prods as $prod ) :
	$post_object = $prod->get_id();
	//ddump( $post_object );
	setup_postdata( $GLOBALS['post'] =& $post_object );
	//$post is the global object
	$original_post = $GLOBALS['post'];

	$terms_brands      = get_the_terms( $original_post, $tax_brand );
	$terms_collections = get_the_terms( $original_post, $tax_collection );
	$terms_materials   = get_the_terms( $original_post, $tax_material );

	if ( ! empty( $terms_brands ) ) :
		foreach ( $terms_brands as $brand ) :
			array_push( $terms_brands_array, $brand->name );
		endforeach;
	endif;

	if ( ! empty( $terms_collections ) ) :
		foreach ( $terms_collections as $collection ) :
			array_push( $terms_collections_array, $collection->name );
		endforeach;
	endif;

	if ( ! empty( $terms_materials ) ) :
		foreach ( $terms_materials as $material ) :
			array_push( $terms_materials_array, $material->name );
		endforeach;
	endif;

endforeach;
wp_reset_postdata();

//make values unique
$terms_brands_array_unique = array_unique( $terms_brands_array );
sort( $terms_brands_array_unique, SORT_NATURAL | SORT_FLAG_CASE );

$terms_collections_array_unique = array_unique( $terms_collections_array );
sort( $terms_collections_array_unique, SORT_NATURAL | SORT_FLAG_CASE );

$terms_materials_array_unique = array_unique( $terms_materials_array );
sort( $terms_materials_array_unique, SORT_NATURAL | SORT_FLAG_CASE );
?>

<form action="">
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
		<li class="uk-column-1-3 uk-columns-1-4@s">
			<?php
			print_radios( $terms_brands_array_unique, $tax_brand, 'brand' );
			?>
		</li>
		<li>
			<?php
			print_radios( $terms_collections_array_unique, $tax_collection, 'collection' );
			?>
		</li>

		<li>
			<?php
			print_radios( $terms_materials_array_unique, $tax_material, 'material' );
			?>
		</li>
	</ul>

	<a class="btn-black uk-button uk-button-default" href="<?php echo esc_url( get_term_link( $current_term_id ) ); ?>">
		<?php esc_html_e( 'Clear Filters', 'wpcanvas' ); ?>
	</a>
</form>

