<?php
$project_images = get_field( 'project_images' );
$options_pages  = get_field( 'pages', 'option' );
$projects_page  = $options_pages['projects'];
?>

<section class="section section-images-grid uk-margin-large-bottom">
	<div class="uk-container uk-container-large">
		<?php
		foreach ( $project_images as $row ) :
			$image1       = $row['image1'];
			$image2       = $row['image2'];
			$image1_width = $image2 ? 'uk-width-1-2@s' : 'uk-width-1-1';
			?>
			<div uk-grid>
				<div class="<?php echo esc_attr( $image1_width ); ?>">
					<figure class="uk-margin-remove">
						<?php echo wp_get_attachment_image( $image1, 'full', false, array( 'class' => 'uk-width-1-1' ) ); ?>
					</figure>
				</div>
				<?php if ( $image2 ) : ?>
					<div class="uk-width-1-2@s">
						<figure class="uk-margin-remove">
							<?php echo wp_get_attachment_image( $image2, 'full', false, array( 'class' => 'uk-width-1-1' ) ); ?>
						</figure>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="uk-container uk-container-xlarge uk-flex uk-flex-right uk-margin-large-top">
		<a class="text-black uk-text-light uk-text-uppercase uk-flex uk-flex-middle" href="<?php echo esc_url( $projects_page ); ?>">
			<svg width="14" height="24" class="uk-margin-right" aria-hidden="true">
				<use xlink:href="#chevron-prev-arrow"></use>
			</svg>
			<?php esc_html_e( 'Back to projects', 'wpcanvas' ); ?>
		</a>
	</div>
</section>
