<?php
$args         = array(
	'hide_empty' => false,
	'parent'     => 0,
	'exclude'    => 15, //uncategorized
);
$product_cats = get_terms( 'product_cat', $args );
$label        = get_field( 'labels' )['second_section_label'];
?>

<section class="section section-product-categories uk-margin-large-top uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<?php if ( $label ) : ?>
			<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
				<?php echo esc_html( $label ); ?>
			</h2>
		<?php endif; ?>
		<div uk-slider>
			<ul class="uk-slider-items uk-grid-medium uk-grid">
				<?php
				foreach ( $product_cats as $cat ) :
					$cat_id     = $cat->term_id;
					$cat_name   = $cat->name;
					$acf_term   = 'product_cat_' . $cat_id;
					$cat_img_id = get_field( 'featured_image_home', $acf_term );
					?>
					<li class="uk-width-3-4 uk-width-2-5@s uk-width-auto@l">
						<a class="text-shadow-hover" href="<?php echo esc_url( get_term_link( $cat_id ) ); ?>">
							<figure class="uk-margin-remove">
								<?php
								echo wp_get_attachment_image( $cat_img_id, 'full', false, array( 'class' => 'object-fit-cover' ) );
								?>
							</figure>
							<h3 class="uk-h5 uk-text-light uk-text-uppercase uk-margin-small-top uk-margin-remove-bottom">
								<?php echo esc_html( $cat_name ); ?>
							</h3>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<?php
			get_template_part(
				'partials/slider-arrows',
				null,
				array(
					'label_prev' => __( 'Previous category', 'wpcanvas' ),
					'label_next' => __( 'Next category', 'wpcanvas' ),
				)
			);
			?>
		</div>
	</div>
</section>
