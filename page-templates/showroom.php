<?php
/*
Template Name: Showroom Page
For more info: http://codex.wordpress.org/Page_Templates
*/

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

				<section class="section section-text section-text-form section-form uk-margin-large-top uk-margin-large-bottom">
					<div class="uk-container uk-container-xlarge">
						<div class="uk-grid-large" uk-grid>
							<div class="uk-width-1-2@m">
								<div class="max-width-740">
									<h1 class="font-weight-100">
										<?php the_title(); ?>
									</h1>
									<div class="showroom-info remove-margin-from-last-el uk-text-light">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
							<div class="uk-width-1-2@m uk-flex uk-flex-right@l">
								<div class="form-wrapper">
									<h2 class="font-weight-100 uk-h1">
										<?php esc_html_e( 'Send Us A Message', 'wpcanvas' ); ?>
									</h2>
									<?php echo do_shortcode( '[contact-form-7 id="aeb2f6d" title="Contact form"]' ); ?>
								</div>
							</div>
						</div>
					</div>
				</section>

			</article>

			<?php
		endwhile;
	endif;
	?>

</main>

<?php
get_footer();
