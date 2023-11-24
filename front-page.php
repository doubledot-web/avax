<?php
get_header();
?>

<main class="site-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				get_template_part( 'partials/content-blocks/hero-slider' );
				get_template_part( 'partials/frontpage/brands' );
				get_template_part( 'partials/content-blocks/mosaic-gallery' );
				?>
			</article>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php
get_footer();
