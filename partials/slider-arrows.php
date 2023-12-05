<?php
$label_prev = isset( $args['label_prev'] ) ? $args['label_prev'] : __( 'Previous Product', 'wpcanvas' );
$label_next = isset( $args['label_next'] ) ? $args['label_next'] : __( 'Previous Product', 'wpcanvas' );
?>

<div class="uk-flex uk-flex-between uk-margin-medium-top">
	<a class="uk-hidden-hover" href="#" uk-slider-item="previous" aria-label="<?php echo esc_attr( $label_prev ); ?>">
		<svg width="14" height="24" aria-hidden="true">
			<use xlink:href="#chevron-prev-arrow"></use>
		</svg>
	</a>
	<a class="uk-hidden-hover" href="#" uk-slider-item="next" aria-label="<?php echo esc_attr( $label_next ); ?>">
		<svg width="14" height="24" aria-hidden="true">
			<use xlink:href="#chevron-next-arrow"></use>
		</svg>
	</a>
</div>
