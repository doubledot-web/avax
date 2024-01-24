<?php
$other     = get_field( 'other', 'option' );
$shipping  = $other['shipping'];
$downloads = get_field( 'downloads' );
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
		<?php
	endif;
	if ( is_user_logged_in() && ! empty( $downloads ) ) :
		?>
		<li>
			<a class="uk-accordion-title uk-text-uppercase uk-display-inline-block" href>
				<?php esc_html_e( 'Downloads', 'wpcanvas' ); ?>
			</a>
			<div class="uk-accordion-content">
				<div class="uk-margin-small-bottom">
					<?php esc_html_e( 'Product fact sheet', 'wpcanvas' ); ?>
				</div>
				<?php foreach ( $downloads as $download ) : ?>
					<div class="uk-margin-small-bottom">
						<a class="text-black text-black-hover" href="<?php echo esc_url( $download['file'] ); ?>" target="_blank">
							<?php echo esc_html( $download['file_name'] ); ?>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</li>
	<?php endif; ?>
</ul>
