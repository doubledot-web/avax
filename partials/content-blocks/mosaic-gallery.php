<?php
$gallery        = get_field( 'mosaic_gallery_fields' );
$gallery_title  = $gallery['title'];
$gallery_images = $gallery['images'];
if ( ! empty( $gallery_images ) ) :
	?>
	<section class="section section-mosaic-gallery">
		<div class="uk-container">
			<h2 class="font-weight-100 uk-h1 uk-margin-medium-bottom uk-text-center">
				<?php echo esc_html( $gallery_title ); ?>
			</h2>
		</div>
		<ul class="grid list-base">
			<?php
			foreach ( $gallery_images as $image_block ) :
				$image_url = $image_block['url'];
				?>
				<li>
					<?php if ( $image_url ) : ?>
						<a href="<?php echo esc_url( $image_url ); ?>">
					<?php endif; ?>
					<figure class="uk-margin-remove uk-transition-toggle uk-light uk-position-relative">
						<?php echo wp_get_attachment_image( $image_block['image'], 'full', '', array( 'class' => 'object-fit-cover uk-width-1-1' ) ); ?>
						<div class="uk-overlay-primary uk-position-cover">
						<div class="uk-position-center">
							<span class="uk-transition-fade" uk-icon="icon: plus; ratio: 2"></span>
						</div>
						</div>
					</figure>
					<?php if ( $image_url ) : ?>
						</a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	<?php
endif;
