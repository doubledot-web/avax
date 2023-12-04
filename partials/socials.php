<?php
$options_contact = get_field( 'contact', 'options' );
$options_socials = $options_contact['socials'];
$icon_colors     = ! empty( $args['header_color_white'] ) ? 'fill-white fill-black-hover' : 'fill-black fill-white-hover';
?>

<div class="socials transition-all">
	<a class="uk-display-inline-block" href="<?php echo esc_url( $options_socials['instagram'] ); ?>" title="<?php esc_attr_e( 'Find us on Instagram', 'wpcanvas' ); ?>">
		<svg class="<?php echo esc_attr( $icon_colors ); ?> transition-fill" width="38" height="37" aria-hidden="true">
			<use xlink:href="#instagram"></use>
		</svg>
	</a>
	<a class="uk-display-inline-block" href="<?php echo esc_url( $options_socials['facebook'] ); ?>" title="<?php esc_attr_e( 'Find us on Facebook', 'wpcanvas' ); ?>">
		<svg class="<?php echo esc_attr( $icon_colors ); ?> transition-fill" width="38" height="37" aria-hidden="true">
			<use xlink:href="#facebook"></use>
		</svg>
	</a>
	<a class="uk-display-inline-block" href="<?php echo esc_url( $options_socials['linkedin'] ); ?>" title="<?php esc_attr_e( 'Find us on LinkedIn', 'wpcanvas' ); ?>">
		<svg class="<?php echo esc_attr( $icon_colors ); ?> transition-fill" width="38" height="37" aria-hidden="true">
			<use xlink:href="#linkedin"></use>
		</svg>
	</a>
</div>
