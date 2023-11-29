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
				?>
				<section class="section section-text uk-margin-large-top uk-margin-large-bottom">
					<div class="uk-container uk-container-small uk-margin-remove-left uk-margin-remove-right">
						<h1 class="font-weight-100 uk-margin-remove">
							<?php the_title(); ?>
						</h1>
						<p class="uk-text-light uk-h2 uk-margin-remove">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>
						<div class="uk-text-light uk-margin-medium-top">
							<?php the_content(); ?>
						</div>
					</div>
				</section>
				<?php get_template_part( 'partials/single-project/gallery' ); ?>
			</article>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php
get_footer();
