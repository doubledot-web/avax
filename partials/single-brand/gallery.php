<?php $images = get_field( 'images' ); ?>

<section class="section section-image-gallery uk-margin-xlarge-bottom">
	<div class="uk-container uk-container-large">
		<div uk-grid>
			<?php
			$number = 1;
			foreach ( $images as $img_id ) :
				$col_class = 0 === $number % 3 ? 'uk-width-1-1' : 'uk-width-1-2@s';
				?>
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<figure class="uk-margin-remove">
						<?php echo wp_get_attachment_image( $img_id, 'full', false, array( 'class' => 'uk-width-1-1' ) ); ?>
					</figure>
				</div>
				<?php
				++$number;
			endforeach;
			?>
		</div>
	</div>
</section>
