<?php
/*
Template Name: About Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$first_section       = get_field( 'first_section_about' );
$second_section      = get_field( 'second_section_about' );
$second_section_rows = $second_section['rows'];
$third_section       = get_field( 'third_section_about' );
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
				echo content_block_text_image_image( $first_section, 'our-company' );
				?>

				<section class="section section-text section-bg-gray uk-padding-large uk-padding-remove-horizontal uk-margin-large-bottom">
					<div class="max-width-1600 uk-container uk-margin-medium-top">
						<h2 class="font-weight-100 uk-h1 uk-text-center uk-margin-remove">
							<?php echo esc_html( $second_section['title'] ); ?>
						</h2>

						<div class="uk-margin-large-top uk-margin-medium-bottom" uk-grid>
							<?php foreach ( $second_section_rows as $row ) : ?>
								<div class="uk-width-1-2@m">
									<div class="max-width-740 remove-margin-from-last-el uk-text-light">
										<?php echo wp_kses_post( $row['left_column'] ); ?>
									</div>
								</div>
								<div class="uk-width-1-2@m">
									<div class="max-width-740 remove-margin-from-last-el uk-text-light">
										<?php echo wp_kses_post( $row['right_column'] ); ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>

				<section id="our-services" class="section section-text section-services uk-margin-xlarge-bottom">
					<div class="uk-container uk-container-expand pr-remove-horizontal@l">
						<div class="uk-grid-large" uk-grid>
							<div class="uk-width-1-2@m uk-margin-auto-top">
								<div class="max-width-740 remove-margin-from-last-el uk-text-light">
									<?php echo wp_kses_post( $third_section['text'] ); ?>
								</div>
							</div>
							<div class="uk-width-1-2@m uk-flex uk-flex-right@m">
								<figure class="uk-flex uk-margin-remove">
									<?php echo wp_get_attachment_image( $third_section['image'], 'full', false, array( 'class' => 'object-fit-cover' ) ); ?>
								</figure>
							</div>
						</div>
					</div>
				</section>

				<?php
				get_template_part( 'partials/showrooms' );
				?>
			</article>

			<?php
		endwhile;
	endif;
	?>

</main>

<?php
get_footer();
