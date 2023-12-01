<?php
function link_func( $atts ) {
	$atts  = shortcode_atts(
		array(
			'title' => '',
			'link'  => '',
		),
		$atts
	);
	$title = $atts['title'];
	$link  = $atts['link'];
	ob_start();
	?>
	<a class="uk-button uk-button-default uk-text-uppercase uk-margin-top" href="<?php echo esc_url( $link ); ?>">
		<?php echo esc_html( $title ); ?>
	</a>
	<?php
	return ob_get_clean();
}
add_shortcode( 'link', 'link_func' );

function image_grid_func( $atts ) {
	$atts       = shortcode_atts(
		array(
			'ids' => '',
		),
		$atts
	);
	$imgs       = explode( ',', $atts['ids'] );
	$imgs_count = count( $imgs );
	if ( $imgs_count > 1 ) :
		$grid_class = ' grid grid-' . $imgs_count . ' uk-flex-wrap';
	else :
		$grid_class = '';
	endif;
	ob_start();
	?>
	<div class="imgs-shortcode uk-flex<?php echo esc_attr( $grid_class ); ?>">
		<?php
		foreach ( $imgs as $img ) :
			$img_caption = wp_get_attachment_caption( $img );
			?>
			<figure class="uk-margin-remove">
				<?php
				echo wp_get_attachment_image( $img, 'full', false, array( 'class' => 'uk-width-1-1' ) );
				if ( $img_caption ) :
					?>
					<figcaption class="uk-text-left uk-text-uppercase uk-margin-small-top">
						<?php echo esc_html( $img_caption ); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'image_grid', 'image_grid_func' );
