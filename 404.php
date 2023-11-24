<?php get_header(); ?>

<div id="content" class="uk-container">
	
	<div id="inner-content" class="uk-text-center">
		
		<header class="article-header">
			<h1><?php _e( 'Article Not Found', 'wpcanvas' ); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'wpcanvas' ); ?></p>
		</section>

		<section class="search">
			<p><?php get_search_form(); ?></p>
		</section>

	</div>

</div>

<?php get_footer(); ?>
