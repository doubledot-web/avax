<?php
global $product;
$prod_cats = get_the_terms( $product->get_id(), 'product_cat' );
?>

<div class="woocommerce-breadcrumb-wrapper bg-white uk-margin-large-top uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<nav class="woocommerce-breadcrumb uk-text-light" aria-label="Breadcrumb">
			<span>
				<?php esc_html_e( 'Shop', 'wpcanvas' ); ?>
			</span>
			&nbsp;&gt;&nbsp;
			<?php
			foreach ( $prod_cats as $prod ) :
				if ( 0 === $prod->parent ) :
					?>
					<a class="text-black text-shadow-hover" href="<?php echo esc_url( get_term_link( $prod->term_id ) ); ?>">
						<?php echo esc_html( $prod->name ); ?>
					</a>
					&nbsp;&gt;&nbsp;
					<?php
				else :
					continue;
				endif;
			endforeach;
			foreach ( $prod_cats as $prod ) :
				if ( 0 !== $prod->parent ) :
					?>
					<a class="text-black text-shadow-hover" href="<?php echo esc_url( get_term_link( $prod->term_id ) ); ?>">
						<?php echo esc_html( $prod->name ); ?>
					</a>
					&nbsp;&gt;&nbsp;
					<?php
				else :
					continue;
				endif;
			endforeach;
			?>

			<span>
				<?php the_title(); ?>
			</span>
		</nav>
	</div>
</div>
