<?php
/*
Template Name: Brands Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$args  = array(
	'hide_empty' => false,
);
$query = get_terms( 'product_brand', $args );
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

				<section class="section section-text uk-margin-large-bottom">
					<div class="uk-container uk-container-large">
						<div class="remove-margin-from-last-el uk-text-center uk-text-light">
							<?php the_content(); ?>
						</div>
					</div>
				</section>

				<?php if ( ! empty( $query ) ) : ?>
					<section class="section section-brands uk-margin-large-bottom">
						<div class="uk-container uk-container-large">
							<div class="uk-grid-medium" uk-grid>
								<?php
								foreach ( $query as $brand ) :
									$brand_id         = $brand->term_id;
									$brand_name       = $brand->name;
									$brand_link       = get_term_link( $brand_id );
									$acf_term         = 'product_brand_' . $brand_id;
									$brand_logo_id    = get_field( 'logo', $acf_term );
									$related_page_url = get_field( 'related_page', $acf_term );
									?>
									<div class="uk-width-1-2 uk-width-1-3@s uk-width-1-4@m">
										<article class="brand uk-text-center">
											<a href="<?php echo esc_url( $related_page_url ); ?>">
												<figure class="uk-margin-remove">
													<?php echo wp_get_attachment_image( $brand_logo_id, 'full' ); ?>
												</figure>
											</a>
										</article>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
				<?php endif; ?>

				<?php //get_template_part( 'partials/template-parts/common/newsletter' ); ?>
			</article>

			<?php
		endwhile;
	endif;
	?>

</main>

<?php
get_footer();
