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
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

/*shop->is archive but without parent, term_id etc*/
$current_term = get_queried_object();

if ( is_product_category() ) :
	$current_term_parent = $current_term->parent;

	/*Check if top level categories*/
	if ( 0 === $current_term_parent && get_queried_object_id() !== get_product_cat_wpml_id( 47 ) ) :
		get_template_part( 'partials/archive-product/top-cat', null, array( 'current_term' => $current_term ) );
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

<?php if ( is_product_category() ) : ?>
	<div class="breadcrumbs-sorting-wrapper bg-white">
		<div class="uk-container uk-container-xlarge">
			<?php woocommerce_breadcrumb(); ?>
			<div class="inner uk-margin-top uk-margin-small-bottom">
				<div class="left">
					<?php //woocommerce_breadcrumb(); ?>
					<div class="toggle-filters-wrapper">
						<button class="btn-base btn-toggle-filters uk-text-uppercase uk-text-light uk-flex uk-flex-middle" type="button">
							<span>
								<span class="uk-visible@s">
									<?php esc_html_e( 'Apply', 'wpcanvas' ); ?>
								</span>
								<span>
									<?php esc_html_e( 'filters', 'wpcanvas' ); ?>
								</span>
							</span>
							<svg width="13" height="10" class="uk-margin-left" aria-hidden="true">
								<use xlink:href="#chevron-down-arrow"></use>
							</svg>
						</button>
					</div>
				</div>
				<div class="right">
					<?php
					woocommerce_catalog_ordering();
					woocommerce_result_count();
					?>
				</div>
			</div>
		</div>

		<div class="uk-container uk-container-xlarge">
			<div class="filters-wrapper uk-padding-large uk-padding-remove-horizontal uk-padding-remove-top">
				<?php get_template_part( 'partials/archive-product/filters', null, array( 'current_term' => $current_term ) ); ?>
			</div>

			<?php if ( ! empty( $_GET ) && ( array_key_exists( 'brand', $_GET ) || array_key_exists( 'collection', $_GET ) || array_key_exists( 'material', $_GET ) ) ) : ?>
				<div class="uk-flex uk-flex-column uk-text-uppercase uk-margin-small-bottom">
					<div  class="font-weight-500">
						<?php esc_html_e( 'Selected Filters', 'wpcanvas' ); ?>:
					</div>
					<div class="uk-text-light uk-flex uk-flex-column">
						<?php
						foreach ( $_GET as $key => $value ) :
							if ( 'brand' === $key ) :
								?>
								<div class="gap-10 uk-flex uk-flex-middle">
									<div>
										<?php esc_html_e( 'Brand', 'wpcanvas' ); ?>:
										<?php echo esc_html( get_term_by( 'slug', $value, 'product_brand' )->name ); ?>
									</div>
									<a href="<?php echo esc_url( remove_query_arg( 'brand' ) ); ?>" aria-label="<?php esc_attr_e( 'Remove this brand', 'wpcanvas' ); ?>">
										<svg width="14" height="14" aria-hidden="true">
											<use xlink:href="#close"></use>
										</svg>
									</a>
								</div>
								<?php
							endif;
							if ( 'collection' === $key ) :
								?>
								<div class="gap-10 uk-flex uk-flex-middle">
									<div>
										<?php esc_html_e( 'Collection', 'wpcanvas' ); ?>:
										<?php echo esc_html( get_term_by( 'slug', $value, 'product_collection' )->name ); ?>
									</div>
									<a href="<?php echo esc_url( remove_query_arg( 'collection' ) ); ?>" aria-label="<?php esc_attr_e( 'Remove this collection', 'wpcanvas' ); ?>">
										<svg width="14" height="14" aria-hidden="true">
											<use xlink:href="#close"></use>
										</svg>
									</a>
								</div>
								<?php
							endif;
							if ( 'material' === $key ) :
								?>
								<div class="gap-10 uk-flex uk-flex-middle">
									<div>
										<?php esc_html_e( 'Material', 'wpcanvas' ); ?>:
										<?php echo esc_html( get_term_by( 'slug', $value, 'pa_material' )->name ); ?>
									</div>
									<a href="<?php echo esc_url( remove_query_arg( 'material' ) ); ?>" aria-label="<?php esc_attr_e( 'Remove this material', 'wpcanvas' ); ?>">
										<svg width="14" height="14" aria-hidden="true">
											<use xlink:href="#close"></use>
										</svg>
									</a>
								</div>
								<?php
							endif;
						endforeach;
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>



<?php else : ?>
	<div class="uk-container uk-container-xlarge">
		<h1 class="font-weight-100 uk-margin-top uk-margin-bottom">
			<?php esc_html_e( 'Tag', 'wpcanvas' ); ?> :
			<?php echo esc_html( $current_term->name ); ?>
		</h1>
	</div>
<?php endif; ?>


<?php

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
//do_action( 'woocommerce_shop_loop_header' );

?>

<div class="uk-container uk-container-xlarge">
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
	?>
</div>

<?php
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
