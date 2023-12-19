<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<section class="section section-text uk-padding-large uk-padding-remove-horizontal">
			<div class="uk-container uk-container-small uk-margin-remove-left uk-margin-remove-right">
				<h1>
					<?php esc_html_e( 'Page Not Found', 'wpcanvas' ); ?>
				</h1>
				<p class="uk-text-light">
					<?php _e( 'Ooops, we couldn’t find that! The page you requested does not exist. <br> Return to homepage or check the menu to find what you are looking for.', 'wpcanvas' ); ?>
				</p>
			</div>
		</section>
	</main>
</div>

<?php
get_footer();
