<?php
$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
if ( ! empty( $languages ) ) :
	?>
	<div class="langs uk-text-uppercase uk-flex uk-margin-right">
		<?php
		foreach ( $languages as $language ) :
			$lang_active = $language['active'] ? 'active ' : '';
			$code        = 'el' === $language['code'] ? __( 'gr', 'wpcanvas' ) : $language['code'];
			?>
			<a class="<?php echo esc_attr( $lang_active ); ?>text-black text-black-hover uk-margin-small-right" href="<?php echo esc_url( $language['url'] ); ?>">
				<?php echo esc_html( $code ); ?>
			</a>
		<?php endforeach; ?>
	</div>
	<?php
endif;
?>
