<div id="primary-sidebar" class="sidebar uk-width-1-3@m" role="complementary">

	<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>

		<?php dynamic_sidebar( 'primary-sidebar' ); ?>

	<?php else : ?>

		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'thisisbare' ); ?></p>
		</div>

	<?php endif; ?>

</div>
