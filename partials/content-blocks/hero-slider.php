<?php
$queried_id         = isset( $args['current_term'] ) ? $args['current_term']->taxonomy . '_' . $args['current_term']->term_id : '';
$hero_fields        = get_field( 'hero_fields', $queried_id );
$slides             = $hero_fields['slides'];
?>

<section class="section section-hero">
	<div uk-slideshow="ratio: false">
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
						$link        = $image_info['link'];
						?>
						<!--<div class="uk-position-relative uk-height-1-1">-->
							<?php if ( $mob_img ) : ?>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $mob_img_pos ); ?> uk-hidden@s" data-src="<?php echo esc_url( $mob_img ); ?>" uk-img></div>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $img_pos ); ?> uk-visible@s" data-src="<?php echo esc_url( $img ); ?>" uk-img></div>
							<?php else : ?>
								<div class="bg-lazy uk-position-cover uk-background-cover uk-background-norepeat uk-background-<?php echo esc_attr( $img_pos ); ?>" data-src="<?php echo esc_url( $img ); ?>" uk-img></div>
							<?php endif; ?>
						<!--</div>-->
						<?php if ( $link['url'] && $link['title'] ) : ?>
							<a class="btn-white uk-button uk-button-default uk-position-bottom-center" href="<?php echo esc_url( $link['url'] ); ?>">
								<?php echo esc_html( $link['title'] ); ?>
							</a>
						<?php endif; ?>
						<?php
					elseif ( 'video' === $type ) :
						$video_info       = $slide['video_info'];
						$video_url        = $video_info['video_url'];
						$video_mobile_url = $video_info['video_mobile_url'];
						$video_img        = $video_info['poster_image'];
						$link             = $video_info['link'];
						?>
						<?php if ( $link['url'] && $link['title'] ) : ?>
							<a class="btn-white uk-button uk-button-default uk-position-bottom-center" href="<?php echo esc_url( $link['url'] ); ?>">
								<?php echo esc_html( $link['title'] ); ?>
							</a>
						<?php endif; ?>
						<video class="uk-visible@s" src="<?php echo esc_url( $video_url ); ?>" poster="<?php echo esc_url( $video_img ); ?>" autoplay loop muted playsinline uk-cover ></video>
						<video class="uk-hidden@s" src="<?php echo esc_url( $video_mobile_url ); ?>" poster="<?php echo esc_url( $video_img ); ?>" autoplay loop muted playsinline uk-cover ></video>
						<?php
					endif;
					?>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php
		if ( count( $slides ) > 1 ) :
			$fill_class = $hero_fields['header_color_white'] ? 'fill-white' : 'fill-black';
			?>
			<a class="uk-position-center-left" href="#" uk-slideshow-item="previous" aria-label="<?php esc_attr_e( 'Previous slide', 'wpcanvas' ); ?>">
				<svg class="<?php echo esc_attr( $fill_class ); ?>" width="13" height="22" aria-hidden="true">
					<use xlink:href="#chevron-prev-arrow"></use>
				</svg>
			</a>
			<a class="uk-position-center-right" href="#" uk-slideshow-item="next" aria-label="<?php esc_attr_e( 'Next slide', 'wpcanvas' ); ?>">
				<svg class="<?php echo esc_attr( $fill_class ); ?>" width="13" height="22" aria-hidden="true">
					<use xlink:href="#chevron-next-arrow"></use>
				</svg>
			</a>
		<?php endif; ?>

	</div>
	<?php
	/*if ( is_front_page() ) :
		get_template_part(
			'partials/socials',
			null,
			array(
				'header_color_white' => $header_color_white,
			)
		);
	endif;*/
	?>
</section>
