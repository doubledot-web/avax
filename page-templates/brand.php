<?php
/*
Template Name: Single Brand Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$related_brand_id = get_field( 'related_brand' )->term_id;
$acf_term_id      = 'product_brand_' . $related_brand_id;
$brand_logo_id    = get_field( 'logo', $acf_term_id );
$images           = get_field( 'images' );
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

				<section class="section section-text uk-margin-large-top uk-margin-xlarge-bottom">
					<div class="uk-container uk-container-xlarge">
						<div class="uk-grid-large" uk-grid>
							<div class="uk-width-1-2@m">
								<div class="max-width-740 remove-margin-from-last-el uk-text-light">
									<figure class="uk-margin-remove">
										<?php echo wp_get_attachment_image( $brand_logo_id, 'full' ); ?>
									</figure>
									<?php the_content(); ?>
								</div>
							</div>
							<div class="uk-width-1-2@m uk-flex uk-flex-right@m">
								<figure class="uk-flex uk-margin-remove">
									<?php
									the_post_thumbnail(
										'full',
										array(
											'loading' => 'lazy',
											'class'   => 'object-fit-cover',
										)
									);
									?>
								</figure>
							</div>
						</div>
					</div>
				</section>

				<section class="section section-text uk-margin-xlarge-bottom">
					<div class="uk-container uk-container-large">
						<div class="remove-margin-from-last-el font-weight-100 uk-h1 uk-text-center">
							<?php the_field( 'text' ); ?>
						</div>
					</div>
				</section>

				<section class="section section-image-gallery uk-margin-xlarge-bottom">
					<div class="uk-container uk-container-large">
						<div uk-grid>
							<?php
							$number = 1;
							foreach ( $images as $img_id ) :
								$col_class = $number % 3 === 0 ? 'uk-width-1-1' : 'uk-width-1-2@s';
								?>
								<div class="<?php echo esc_attr( $col_class ); ?>">
									<figure class="uk-margin-remove">
										<?php echo wp_get_attachment_image( $img_id, 'full', false, array( 'class' => 'uk-width-1-1' ) ); ?>
									</figure>
								</div>
								<?php
								++$number;
							endforeach;
							?>
						</div>
					</div>
				</section>

				<?php
				get_template_part( 'partials/single-brand/related' );
				?>
			</article>

			<?php
		endwhile;
	endif;
	?>

</main>

<?php
get_footer();
