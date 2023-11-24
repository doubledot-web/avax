<?php
$options_contact = get_field( 'contact', 'options' );
$options_emails  = $options_contact['emails'];
$options_socials = $options_contact['socials'];
?>

<div id="modal-menu" class="modal-menu bg-blue uk-modal-full uk-hidden@l" uk-modal="bg-close: false">
	<div class="top-wrapper uk-flex">
		<div class="uk-container uk-container-expand uk-width-1-1 uk-flex uk-flex-middle uk-flex-between">
			<a class="logo uk-display-inline-block uk-navbar-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AVAX logo', 'wpcanvas' ); ?>">
				<svg width="160" height="72" role="img">
					<use xlink:href="#logo"></use>
				</svg>
			</a>

			<div class="menu-right uk-navbar-right">
				<button class="open-mobile-search-form btn-base" aria-label="<?php esc_attr_e( 'Open search form', 'wpcanvas' ); ?>" type="button">
					<svg width="29" height="30" aria-hidden="true">
						<use xlink:href="#search"></use>
					</svg>
				</button>
				<?php get_template_part( 'partials/menu-right-common-links' ); ?>
			</div>
		</div>
	</div>

	<div class="uk-modal-dialog uk-flex">
		<div class="uk-container uk-container-expand uk-width-1-1">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'main-nav',
					'menu_class'      => 'accordion',
					'container_class' => 'accordion-wrapper uk-width-1-1',
					//'walker'          => new WPCanvas_Mobile_Top_Menu(),
				)
			);
			?>
			<form role="search" method="get" class="search-form search-form-mobile" action="<?php echo esc_url( get_the_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
				<input type="search" class="search-field uk-input" placeholder="<?php esc_attr_e( 'Search', 'wpcanvas' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			</form>

		</div>
	</div>

	<div class="bottom-wrapper plr-uikit-grid uk-flex uk-flex-middle uk-flex-between">
		<?php get_template_part( 'partials/socials' ); ?>

		<button class="btn btn-base uk-modal-close-default" type="button" aria-label="<?php esc_attr_e( 'Close mobile menu', 'wpcanvas' ); ?>">
			<svg width="24" height="24" aria-hidden="true">
				<use xlink:href="#close"></use>
			</svg>
		</button>
	</div>

</div>