<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field uk-input" minlength="3" placeholder="<?php esc_attr_e( 'Search', 'wpcanvas' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>
