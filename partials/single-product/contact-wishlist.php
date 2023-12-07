<?php
$options_pages = get_field( 'pages', 'option' );
$contact_page  = $options_pages['contact'];
?>

<div class="contact-wishlist-wrapper uk-text-light uk-margin-small-top uk-flex uk-flex-middle">
	<a class="uk-button uk-button-default" href="<?php echo esc_url( $contact_page ); ?>">
		<?php esc_html_e( 'Contact', 'wpcanvas' ); ?>
	</a>
	<div>
		<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
	</div>
</div>
