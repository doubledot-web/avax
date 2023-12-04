<?php
$label_prev = is_front_page() ? __( 'Previous Category', 'wpcanvas' ) : __( 'Previous Product', 'wpcanvas' );
$label_next = is_front_page() ? __( 'Next Category', 'wpcanvas' ) : __( 'Next Product', 'wpcanvas' );
?>

<div class="slider-arrows uk-flex uk-flex-between uk-margin-top">
	<a class="slider-prev uk-hidden-hover" href="#" uk-slider-item="previous" aria-label="<?php echo esc_attr( $label_prev ); ?>">
		<svg width="14" height="24" aria-hidden="true">
			<use xlink:href="#chevron-prev-arrow"></use>
		</svg>
	</a>
	<a class="slider-next uk-hidden-hover" href="#" uk-slider-item="next" aria-label="<?php echo esc_attr( $label_next ); ?>">
		<svg width="14" height="24" aria-hidden="true">
			<use xlink:href="#chevron-next-arrow"></use>
		</svg>
	</a>
</div>
