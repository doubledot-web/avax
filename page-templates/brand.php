<?php
/*
Template Name: Single Brand Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
					get_template_part( 'partials/content-blocks/hero-slider' );
					get_template_part( 'partials/single-brand/text-image' );
					get_template_part( 'partials/single-brand/text' );
					get_template_part( 'partials/single-brand/gallery' );
					get_template_part( 'partials/single-brand/related' );
					get_template_part( 'partials/single-brand/clickable-image-text' );
					?>
				</article>

				<?php
			endwhile;
		endif;
		?>
	</main>
</div>

<?php
get_footer();
