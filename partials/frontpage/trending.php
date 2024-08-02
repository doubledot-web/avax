<?php
$fourth_section_slides = get_field( 'fourth_section_home' );
$label                 = get_field( 'labels' )['fourth_section_label'];
?>

<section class="section section-trending uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<?php if ( $label ) : ?>
			<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
				<?php echo esc_html( $label ); ?>
			</h2>
		<?php endif; ?>

		<div class="uk-container uk-container-xlarge uk-padding-remove">
			<div uk-slider>
				<ul class="uk-slider-items uk-grid-small uk-grid">
					<?php
					foreach ( $fourth_section_slides as $slide ) :
						?>
						<li class="uk-width-3-4 uk-width-2-5@s uk-width-auto@xl">
							<a class="text-black text-black-hover text-shadow-hover" href="<?php echo esc_url( $slide['product'] ); ?>">
								<figure class="uk-margin-remove">
									<?php echo wp_get_attachment_image( $slide['image'], 'full' ); ?>
								</figure>
								<div class="uk-text-light uk-margin-small-top">
									<?php echo wp_kses_post( $slide['text'] ); ?>
								</div>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php
				get_template_part(
					'partials/slider-arrows',
					null,
					array(
						'label_prev' => __( 'Previous product', 'wpcanvas' ),
						'label_next' => __( 'Next product', 'wpcanvas' ),
					)
				);
				?>
			</div>
		</div>
	</div>
</section>
