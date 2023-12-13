<?php
/*
Template Name: Downloads Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$items = get_field( 'items' );
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

					<section class="section section-text section-text-form section-form uk-margin-large-top uk-margin-xlarge-bottom">
						<div class="uk-container uk-margin-remove">
							<div class="max-width-740 remove-margin-from-last-el uk-text-light">
								<?php the_content(); ?>
							</div>
						</div>
					</section>

					<section class="section section-pds uk-margin-xlarge-bottom">
						<div class="uk-container uk-container-large">
							<div class="uk-grid-large" uk-grid>
							<?php
							foreach ( $items as $item ) :
								?>
								<div class="uk-width-1-2@s">
									<a class="text-black" href="<?php echo esc_url( $item['file'] ); ?>" target="_blank" download>
										<figure class="uk-margin-remove">
											<?php echo wp_get_attachment_image( $item['image'], 'full' ); ?>
											<figcaption class="uk-text-light uk-text-uppercase uk-margin-medium-top">
												<?php echo esc_html( $item['title'] ); ?>
											</figcaption>
										</figure>
									</a>
								</div>
							<?php endforeach; ?>
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
