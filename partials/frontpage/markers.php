<?php
$third_section_slides = get_field( 'third_section_home' );
$img                  = $third_section_slides['image'];
$markers              = $third_section_slides['markers'];
$options_pages        = get_field( 'pages', 'option' );
$projects_page        = $options_pages['projects'];
?>

<section class="section section-image-map uk-position-relative uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
			<?php esc_html_e( 'Contract Division', 'wpcanvas' ); ?>
		</h2>
	</div>

	<figure class="map uk-position-relative uk-margin-remove">
		<?php
		echo wp_get_attachment_image( $img, 'full' );
		if ( ! empty( $markers ) ) :
			?>
			<figcaption>
				<?php
				foreach ( $markers as $marker ) :
					$prod_id = $marker['product'];
					$wc_prod = wc_get_product( $prod_id );
					if ( $wc_prod->is_type( 'simple' ) ) :
						$prod_price = wc_get_price_including_tax( $wc_prod );
					elseif ( $wc_prod->is_type( 'variable' ) ) :
						$prod_lowest_price  = $wc_prod->get_variation_price( 'min', false );
						$prod_highest_price = $wc_prod->get_variation_price( 'max', false );
						if ( $prod_lowest_price !== $prod_highest_price ) :
							$prod_price = $prod_lowest_price . ' - ' . $prod_highest_price;
						else :
							$prod_price = $prod_lowest_price;
						endif;
					endif;
					$final_prod_price = $prod_price . '€';
					?>
					<div class="marker text-white uk-flex uk-flex-column uk-flex-middle uk-position-absolute" style="top: <?php echo esc_attr( $marker['top'] ); ?>%; left: <?php echo esc_attr( $marker['left'] ); ?>%">
						<button class="marker-btn btn-base uk-position-relative"></button>
						<a class="marker-product text-white text-white-hover uk-text-center uk-position-absolute" href="<?php echo esc_url( get_permalink( $prod_id ) ); ?>">
							<?php
							echo esc_html( get_the_title( $prod_id ) );
							if ( 0 != $prod_price ) :
								?>
								<div class="product-price">
									<?php echo esc_html( $final_prod_price ); ?>
								</div>
							<?php endif; ?>
						</a>
					</div>
				<?php endforeach; ?>
			</figcaption>
		</figure>
		<div class="uk-text-center uk-margin-top">
			<a class="btn-white uk-button uk-button-default" href="<?php echo esc_url( $projects_page ); ?>">
				<?php esc_html_e( 'Discover', 'wpcanvas' ); ?>
			</a>
		</div>
	<?php endif; ?>
</section>
