<form role="search" method="get" class="search-form" action="<?php echo esc_url( get_the_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
	<input type="search" class="search-field uk-input" placeholder="<?php esc_attr_e( 'Search', 'wpcanvas' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>
