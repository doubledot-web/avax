<?php
/*
Template Name: Showroom Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$contact      = get_field( 'contact', 'option' );
$cf_shortcode = $contact['contact_form_shortcode'];
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
						<div class="uk-container uk-container-xlarge">
							<div class="uk-grid-large" uk-grid>
								<div class="uk-width-1-2@l uk-flex uk-flex-column">
									<div class="max-width-740">
										<h1 class="font-weight-100">
											<?php the_title(); ?>
										</h1>
										<div class="showroom-info remove-margin-from-last-el uk-text-light">
											<?php the_content(); ?>
										</div>
									</div>
									<div class="flex-grow-1 uk-margin-medium-top">
										<?php the_field( 'map' ); ?>
									</div>
								</div>
								<div class="uk-width-1-2@l uk-flex uk-flex-right@l">
									<div class="form-wrapper uk-flex uk-flex-column">
										<h2 class="title font-weight-100 uk-h1">
											<?php esc_html_e( 'Send Us A Message', 'wpcanvas' ); ?>
										</h2>
										<?php echo do_shortcode( $cf_shortcode ); ?>
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
</div>

<?php
get_footer();
