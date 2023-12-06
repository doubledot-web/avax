<?php
/*
Template Name: Downloads Page
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
					?>

					<section class="section section-text section-text-form section-form uk-margin-large-top uk-margin-large-bottom">
						<div class="uk-container uk-margin-remove">
							<div class="max-width-740 remove-margin-from-last-el uk-text-light">
								<?php the_content(); ?>
							</div>
						</div>
					</section>

				</article>

				<?php
			endwhile;
		endif;
		?>
	</main>
</div>

<?php
get_footer();
