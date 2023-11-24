<?php
function register_sidebars_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'wpcanvas' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here.', 'wpcanvas' ),
			'before_widget' => '<div id="%1$s" class="widget uk-text-uppercase %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title uk-text-uppercase uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'wpcanvas' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here.', 'wpcanvas' ),
			'before_widget' => '<div id="%1$s" class="widget uk-text-uppercase %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title uk-text-uppercase uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'wpcanvas' ),
			'id'            => 'footer-3',
			'description'   => __( 'Add widgets here.', 'wpcanvas' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title uk-margin-bottom">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'register_sidebars_init' );
