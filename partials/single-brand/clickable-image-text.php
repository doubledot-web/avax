<?php $cols = get_field( 'clickable_image_text' ); ?>

<?php if ( ! empty( $cols ) ) : ?>
	<section class="section section-dynamic-grid uk-margin-large-top uk-margin-large-bottom">
		<div class="uk-container uk-container-large">
			<div class="uk-grid-large" uk-grid>
				<?php
				foreach ( $cols as $col ) :
					?>
					<div class="uk-width-1-2@s">
						<a class="text-black text-black-hover text-shadow-hover" href="<?php echo esc_url( $col['page_link'] ); ?>">
							<figure class="uk-margin-remove">
								<?php echo wp_get_attachment_image( $col['image'], 'full', false, array( 'class' => 'object-fit-cover uk-width-1-1' ) ); ?>
							</figure>
							<div class="uk-text-light uk-margin-small-top">
								<?php echo wp_kses_post( $col['text'] ); ?>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
endif;
