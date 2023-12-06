<?php
/*
Template Name: Showroom Page
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
					<section class="section section-text section-post-content uk-text-center uk-margin-large-top uk-margin-large-bottom">
						<div class="uk-container uk-container-large">
							<div class="uk-margin-medium-bottom">
								<h1 class="uk-margin-small-bottom">
									<?php the_title(); ?>
								</h1>
								<time class="uk-text-light" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
									<?php echo esc_html( get_the_date( 'd F Y' ) ); ?>
								</time>
							</div>
							<div class="remove-margin-from-last-el uk-text-light">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="uk-container uk-container-xlarge uk-flex uk-flex-right uk-margin-large-top">
							<a class="text-black uk-text-light uk-text-uppercase uk-flex uk-flex-middle" href="<?php echo esc_url( get_blog_page_url() ); ?>">
								<svg width="14" height="24" class="uk-margin-right" aria-hidden="true">
									<use xlink:href="#chevron-prev-arrow"></use>
								</svg>
								<?php esc_html_e( 'Back to blog', 'wpcanvas' ); ?>
							</a>
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
