<?php
//$queried_id  = isset( $current_term_id ) & ! empty( $current_term_id ) ? $current_term_tax . '_' . $current_term_id : '';
$hero_fields        = get_field( 'hero_fields' );
$header_color_white = $hero_fields['header_color_white'];
$slides             = $hero_fields['slides'];
?>

<section class="section section-hero uk-margin-large-bottom">
	<div uk-slideshow>
		<ul class="uk-slideshow-items" uk-height-viewport>
			<?php
			foreach ( $slides as $slide ) :
				?>
				<li>
					<?php
					$type = $slide['type'];
					if ( 'image' === $type ) :
						$image_info  = $slide['image_info'];
						$img         = $image_info['image'];
						$img_pos     = str_replace( ' ', '-', $image_info['image_position'] );
						$mob_img     = $image_info['mobile_image'];
						$mob_img_pos = str_replace( ' ', '-', $image_info['mobile_image_position'] );
						?>
						<div uk-height-viewport>
							<?php if ( $mob_img ) : ?>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $mob_img_pos ); ?> uk-hidden@s" data-src="<?php echo esc_url( $mob_img ); ?>" uk-img></div>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $img_pos ); ?> uk-visible@s" data-src="<?php echo esc_url( $img ); ?>" uk-img></div>
							<?php else : ?>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $img_pos ); ?>" data-src="<?php echo esc_url( $img ); ?>" uk-img></div>
							<?php endif; ?>
						</div>
						<?php
					elseif ( 'video' === $type ) :
						$video_info = $slide['video_info'];
						$video_url  = $video_info['video_url'];
						$video_img  = $video_info['poster_image'];
						?>
						<video src="<?php echo esc_url( $video_url ); ?>" poster="<?php echo esc_url( $video_img['url'] ); ?>" autoplay loop muted playsinline uk-cover ></video>
						<?php
					endif;
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
	if ( is_front_page() ) :
		get_template_part(
			'partials/socials',
			null,
			array(
				'header_color_white' => $header_color_white,
			)
		);
	endif;
	?>
</section>