<?php if ( defined( 'YITH_WCWL' ) ) : ?>
	<a class="uk-position-relative" href="<?php echo esc_url( get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ) ); ?>">
		<svg width="31" height="29" aria-hidden="true">
			<use xlink:href="#wishlist"></use>
		</svg>
		<span class="sup-count total-wishlist-count">
			<?php echo esc_html( yith_wcwl_count_all_products() ); ?>
		</span>
	</a>
<?php endif; ?>
<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
	<svg width="25" height="29" aria-hidden="true">
		<use xlink:href="#account"></use>
	</svg>
</a>
<a href="#" class="xoo-wsc-cart-trigger">
	<svg width="33" height="28" aria-hidden="true">
		<use xlink:href="#cart"></use>
	</svg>
</a>
