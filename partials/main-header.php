<?php
if ( is_front_page() || is_singular( array( 'project' ) ) || is_page_template( array( 'page-templates/brands.php', 'page-templates/contract-division.php' ) ) ) :
	$header_position_class = ' header-fixed with-transition';
else :
	$header_position_class = '';
endif;
$hero_fields          = get_field( 'hero_fields' );
$header_color_white   = $hero_fields['header_color_white'];
$header_color_class   = isset( $header_color_white ) && ! empty( $header_color_white ) ? ' header-white' : '';
$header_extra_classes = $header_position_class . $header_color_class;
?>

<header class="site-header<?php echo esc_attr( $header_extra_classes ); ?>">
	<nav class="main-nav uk-navbar-container uk-navbar-transparent">
		<div class="uk-container uk-container-expand">

			<div id="mobile-navbar" class="mobile-navbar navbar uk-flex uk-flex-middle uk-flex-between uk-hidden@l">
				<a class="logo uk-display-inline-block uk-navbar-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AVAX logo', 'wpcanvas' ); ?>">
					<svg width="160" height="72" role="img">
						<use xlink:href="#logo"></use>
					</svg>
				</a>
				<button class="open-mobile-menu btn-base" aria-label="<?php esc_attr_e( 'Open Mobile Menu', 'wpcanvas' ); ?>" uk-toggle="target: #modal-menu" type="button">
					<svg class="stroke-black" width="32" height="16">
						<use xlink:href="#hamburger"></use>
					</svg>
				</button>
			</div>


			<div id="desktop-navbar" class="desktop-navbar navbar uk-visible@l" uk-navbar="dropbar: true; target: .main-menu; mode: click; dropbar-transparent-mode: behind">
				<a class="logo uk-display-inline-block uk-navbar-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AVAX logo', 'wpcanvas' ); ?>">
					<svg width="179" height="80" role="img">
						<use xlink:href="#logo"></use>
					</svg>
				</a>

				<div class="uk-navbar-center">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-nav',
							'menu_class'     => 'main-menu uk-navbar-nav',
							'container'      => false,
							'walker'         => new WPCanvas_Desktop_Top_Menu(),
						)
					);

					get_search_form();
					?>

				</div>

				<?php /*MENU RIGHT*/ ?>
				<div class="menu-right uk-navbar-right">
					<button class="open-search-form btn-base" aria-label="<?php esc_attr_e( 'Open search form', 'wpcanvas' ); ?>" type="button">
						<svg width="29" height="30" aria-hidden="true">
							<use xlink:href="#search"></use>
						</svg>
					</button>
					<button class="close-search-form btn-base" aria-label="<?php esc_attr_e( 'Close search form', 'wpcanvas' ); ?>" type="button">
						<svg width="17" height="17" aria-hidden="true">
							<use xlink:href="#close"></use>
						</svg>
					</button>
					<?php get_template_part( 'partials/menu-right-common-links' ); ?>
				</div>
			</div>
		</div>
	</nav>
</header>

<?php
get_template_part( 'partials/modal-mobile-menu' );

