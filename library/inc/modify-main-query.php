<?php
/*****************************
 ***** MODIFY MAIN QUERY *****
 *****************************/
function filter_products( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) :
		if ( is_product_category() && ( 0 !== get_queried_object()->parent || 42 === get_queried_object_id() || 47 === get_queried_object_id() ) ) :
			if ( ! empty( $_GET ) ) :
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
					endswitch;

					$tax_query[] = array(
						'taxonomy' => $tax_name,
						'field'    => 'slug',
						'terms'    => $value,
					);
				endforeach;
				if ( count( $tax_query ) > 1 ) :
					//$tax_query['relation'] = 'AND';
					endif;
				$query->set( 'tax_query', $tax_query );

				//armchairs
				/*if ( is_product_category( 20 ) ) :
					$brand_arg_slug      = 'brand';
					$collection_arg_slug = 'collection';
					$material_arg_slug   = 'material';

					if ( array_key_exists( $brand_arg_slug, $_GET ) || array_key_exists( $collection_arg_slug, $_GET ) || array_key_exists( $material_arg_slug, $_GET ) ) :
						$tax_query = array();
						if ( array_key_exists( $brand_arg_slug, $_GET ) ) :
							array_push(
								$tax_query,
								array(
									'taxonomy' => 'product_brand',
									'field'    => 'slug',
									'terms'    => $_GET[ $brand_arg_slug ],
								)
							);
						endif;
						if ( array_key_exists( $collection_arg_slug, $_GET ) ) :
							array_push(
								$tax_query,
								array(
									'taxonomy' => 'product_collection',
									'field'    => 'slug',
									'terms'    => $_GET[ $collection_arg_slug ],
								)
							);
						endif;
						if ( array_key_exists( $material_arg_slug, $_GET ) ) :
							array_push(
								$tax_query,
								array(
									'taxonomy' => 'pa_material',
									'field'    => 'slug',
									'terms'    => $_GET[ $material_arg_slug ],
								)
							);
						endif;
						if ( count( $tax_query ) > 1 ) :
							$tax_query['relation'] = 'AND';
							endif;
						$query->set( 'tax_query', $tax_query );
						endif;

				endif;*/

			endif;
		endif;
	endif;
}
add_action( 'pre_get_posts', 'filter_products' );
