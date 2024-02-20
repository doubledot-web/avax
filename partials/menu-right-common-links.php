<?php if ( defined( 'YITH_WCWL' ) ) : ?>
	<a class="uk-position-relative uk-margin-small-right" href="<?php echo esc_url( get_permalink( get_option( 'yith_wcwl_wishlist_page_id' ) ) ); ?>">
		<svg width="24" height="22" aria-hidden="true">
			<use xlink:href="#wishlist"></use>
		</svg>
		<span class="sup-count total-wishlist-count">
			<?php echo esc_html( yith_wcwl_count_all_products() ); ?>
		</span>
	</a>
<?php endif; ?>
<a class="uk-margin-small-right" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
	<svg width="20" height="22" aria-hidden="true">
		<use xlink:href="#account"></use>
	</svg>
</a>
<a class="xoo-wsc-cart-trigger uk-position-relative" href="#">
	<svg width="26" height="22" aria-hidden="true">
		<use xlink:href="#cart"></use>
	</svg>
	<span class="sup-count total-cart-count">
		<?php echo esc_html( yith_wcwl_count_all_products() ); ?>
	</span>
</a>
