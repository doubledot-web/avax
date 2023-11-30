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
