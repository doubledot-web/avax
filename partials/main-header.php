<?php
if ( is_front_page() || is_singular( 'post' ) || ( is_product_category() && 0 === get_queried_object()->parent && get_product_cat_wpml_id( 47 ) !== get_queried_object_id() ) || is_page_template( array( 'page-templates/contract-division.php', 'page-templates/about.php', 'page-templates/showroom.php', 'page-templates/downloads.php', 'page-templates/brand.php' ) ) ) :
	$header_position_class = 'header-fixed';
else :
	$header_position_class = 'header-sticky';
endif;
$queried_id = ! is_archive() ? '' : get_queried_object()->taxonomy . '_' . get_queried_object()->term_id;

if ( ! is_home() ) :
	$hero_fields = get_field( 'hero_fields', $queried_id );
endif;

$header_color_class   = ! empty( $hero_fields['header_color_white'] ) ? ' header-white' : '';
$header_extra_classes = $header_position_class . $header_color_class;
?>

<header class="site-header uk-flex <?php echo esc_attr( $header_extra_classes ); ?>">
	<nav class="main-nav uk-flex uk-width-1-1 uk-navbar-container uk-navbar-transparent">
		<div class="uk-container uk-container-expand uk-flex uk-width-1-1">

			<div id="mobile-navbar" class="mobile-navbar navbar uk-width-1-1 uk-flex uk-flex-middle uk-flex-between uk-hidden@l">
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

			<div id="desktop-navbar" class="uk-flex uk-width-1-1 desktop-navbar navbar uk-visible@l" uk-navbar="dropbar: true; mode: click; target: .main-menu; dropbar-transparent-mode: behind">
				<a class="logo uk-flex uk-navbar-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AVAX logo', 'wpcanvas' ); ?>">
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
				<?php /*TEMP*/ ?>
				<div class="menu-right uk-navbar-right">
					<button class="open-search-form btn-base uk-margin-small-right" aria-label="<?php esc_attr_e( 'Open search form', 'wpcanvas' ); ?>" type="button">
						<svg width="21" height="22" aria-hidden="true">
							<use xlink:href="#search"></use>
						</svg>
					</button>
					<button class="close-search-form btn-base" aria-label="<?php esc_attr_e( 'Close search form', 'wpcanvas' ); ?>" type="button">
						<svg width="17" height="17" aria-hidden="true">
							<use xlink:href="#close"></use>
						</svg>
					</button>
					<?php
					/*<?php get_template_part( 'partials/menu-langs' ); ?>
					<button class="open-search-form btn-base uk-margin-small-right" aria-label="<?php esc_attr_e( 'Open search form', 'wpcanvas' ); ?>" type="button">
						<svg width="21" height="22" aria-hidden="true">
							<use xlink:href="#search"></use>
						</svg>
					</button>
					<button class="close-search-form btn-base" aria-label="<?php esc_attr_e( 'Close search form', 'wpcanvas' ); ?>" type="button">
						<svg width="17" height="17" aria-hidden="true">
							<use xlink:href="#close"></use>
						</svg>
					</button>
					<?php get_template_part( 'partials/menu-right-common-links' ); ?>
					</div>*/
					?>
					<?php
					get_template_part(
						'partials/socials',
						null,
						array(
							'header_color_white' => $header_color_class,
						)
					);
					?>
				<?php /*TEMP*/ ?>
			</div>
		</div>
	</nav>
</header>

<?php
get_template_part( 'partials/modal-mobile-menu' );

