<div id="off-canvas-menu" uk-offcanvas="overlay: true; mode: push;">
	<div class="uk-offcanvas-bar">
		<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
			<div class="uk-margin"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<div class="uk-h1 uk-margin text-logo" itemscope itemtype="http://schema.org/Organization">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>
		<?php endif; ?>

		<nav id="mobile-menu" class="uk-hidden@m" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
			// https://developer.wordpress.org/reference/functions/wp_nav_menu/
			wp_nav_menu(
				array(
					'container'      => false, // remove nav container
					'menu'           => __( 'The Mobile Menu', 'wpcanvas' ), // nav name
					'menu_class'     => 'nav mobile-nav', // adding custom nav class
					'items_wrap'     => '<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>%3$s</ul>',
					'theme_location' => 'main-nav', // where it's located in the theme,
					'walker'         => new Mobile_Submenu_Wrapper(),
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	</div>
</div>