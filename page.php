<?php get_header(); ?>

<div id="content" class="uk-container" uk-height-viewport="expand: true">
	<div id="inner-content" uk-grid>

		<main id="main" class="uk-width-2-3@m" itemprop="mainContentOfPage">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<header class="article-header">
							<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						</header>

						<section class="article-body">
							<?php the_content(); ?>
							<?php // get_template_part( 'partials/content-blocks/init' ); // ACF Flexible Content block builder ?>
							<?php // wp_link_pages(); ?>
						</section>

					</article>

					<?php
				endwhile;
			endif;
			?>
		</main>

		<?php get_template_part( 'asides/sidebar' ); ?>

	</div>
</div>

<?php get_footer(); ?>
