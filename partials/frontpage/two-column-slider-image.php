<?php
$fifth_section        = get_field( 'fifth_section_home' );
$fifth_section_img    = $fifth_section['image'];
$fifth_section_slides = $fifth_section['slides'];
$label                = get_field( 'labels' )['fifth_section_label'];
?>

<section class="section section-two-columns-slider-image uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<?php if ( $label ) : ?>
			<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
				<?php echo esc_html( $label ); ?>
			</h2>
		<?php endif; ?>
	</div>

	<div class="uk-container uk-container-xlarge uk-padding-remove">
		<div class="uk-flex-middle" uk-grid>
			<div class="uk-width-1-2@m">
				<div uk-slider>
					<div class="uk-position-relative">
						<div class="uk-width-5-6 uk-width-4-5@s uk-margin-auto-left uk-margin-auto-right uk-slider-container">
							<ul class="uk-slider-items">
								<?php
								foreach ( $fifth_section_slides as $slide ) :
									?>
									<li class="uk-width-1-1">
										<a class="text-black text-black-hover text-shadow-hover" href="<?php echo esc_url( $slide['product'] ); ?>">
											<figure class="uk-text-center uk-margin-remove">
												<?php echo wp_get_attachment_image( $slide['image'], 'full' ); ?>
											</figure>
											<div class="uk-text-light uk-margin-small-top">
												<?php echo wp_kses_post( $slide['text'] ); ?>
											</div>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?php
						get_template_part(
							'partials/slider-arrows-centered',
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

			<div class="uk-width-1-2@m">
				<figure class="uk-text-center uk-margin-remove">
					<?php echo wp_get_attachment_image( $fifth_section_img, 'full', false, array( 'class' => 'uk-width-1-1' ) ); ?>
				</figure>
			</div>
		</div>
	</div>
</section>
