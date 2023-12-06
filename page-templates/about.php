<?php
/*
Template Name: About Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$first_section = get_field( 'first_section_about' );
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
					echo content_block_text_image_image( $first_section, 'our-company' );
					get_template_part( 'partials/about/values' );
					get_template_part( 'partials/about/services' );
					get_template_part( 'partials/showrooms' );
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
