<?php
$other    = get_field( 'other', 'option' );
$shipping = $other['shipping'];
?>

<ul class="uk-text-light uk-margin-large-top" uk-accordion>
	<li>
		<a class="uk-accordion-title uk-text-uppercase uk-display-inline-block" href>
			<?php esc_html_e( 'More Information', 'wpcanvas' ); ?>
		</a>
		<div class="uk-accordion-content">
			<?php the_content(); ?>
		</div>
	</li>
	<?php if ( $shipping ) : ?>
		<li>
			<a class="uk-accordion-title uk-text-uppercase uk-display-inline-block" href>
				<?php esc_html_e( 'Shipping & Returns', 'wpcanvas' ); ?>
			</a>
			<div class="uk-accordion-content">
				<?php echo wp_kses_post( $shipping ); ?>
			</div>
		</li>
	<?php endif; ?>
</ul>
