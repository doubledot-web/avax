<?php
$other     = get_field( 'other', 'option' );
$shipping  = $other['shipping'];
$downloads = get_field( 'downloads' );
?>

<ul class="uk-text-light uk-margin-large-top" uk-accordion>
	<?php if ( '' !== get_post()->post_content ) : ?>
		<li>
			<a class="uk-accordion-title uk-text-uppercase uk-display-inline-block" href>
				<?php esc_html_e( 'More Information', 'wpcanvas' ); ?>
			</a>
			<div class="uk-accordion-content">
				<?php the_content(); ?>
			</div>
		</li>
		<?php
	endif;
	if ( $shipping ) :
		?>
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
	if ( ! empty( $downloads ) ) :
		?>
		<li>
			<a class="uk-accordion-title uk-text-uppercase uk-display-inline-block" href>
				<?php esc_html_e( 'Downloads', 'wpcanvas' ); ?>
			</a>
			<div class="uk-accordion-content">
				<div class="uk-margin-small-bottom">
					<?php
					esc_html_e( 'Product fact sheet', 'wpcanvas' );
					if ( ! is_user_logged_in() ) :
						?>
						<div class="font-weight-500 uk-text-small">
							<?php esc_html_e( '*Please create an account to view the files!', 'wpcanvas' ); ?>
						</div>
						<?php
					endif;
					?>
				</div>
				<?php foreach ( $downloads as $download ) : ?>
					<div class="uk-margin-small-bottom">
						<?php
						if ( is_user_logged_in() ) :
							?>
							<a class="text-black text-black-hover" href="<?php echo esc_url( $download['file'] ); ?>" target="_blank">
								<?php echo esc_html( $download['file_name'] ); ?>
							</a>
							<?php
						else :
							?>
							<span class="text-black text-black-hover">
								<?php echo esc_html( $download['file_name'] ); ?>
							</span>
							<?php
						endif;
						?>
					</div>
					<?php
				endforeach;
				?>
			</div>
		</li>
	<?php endif; ?>
</ul>
