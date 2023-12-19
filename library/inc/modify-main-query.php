<?php
/*****************************
 ***** MODIFY MAIN QUERY *****
 *****************************/
function filter_products( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) :
		if ( is_search() ) :
			$query->set( 'posts_per_page', 10 );
		elseif ( is_product_category() && ( 0 !== get_queried_object()->parent || 42 === get_queried_object_id() || 47 === get_queried_object_id() ) && ! empty( $_GET ) ) :
			$tax_query = array();
			foreach ( $_GET as $key => $value ) :
				switch ( $key ) :
					//more values here
					case 'brand':
						$tax_name = 'product_brand';
						break;
					case 'collection':
						$tax_name = 'product_collection';
						break;
					case 'material':
						$tax_name = 'pa_material';
						break;
					default:
						unset( $tax_name );
						break;
				endswitch;

				if ( isset( $tax_name ) ) :
					$tax_query[] = array(
						'taxonomy' => $tax_name,
						'field'    => 'slug',
						'terms'    => $value,
					);
				endif;
			endforeach;
			if ( ! empty( $tax_query ) ) :
				$query->set( 'tax_query', $tax_query );
			endif;
		endif;
	endif;
}
add_action( 'pre_get_posts', 'filter_products' );
