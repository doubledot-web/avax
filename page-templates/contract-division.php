<?php
/*
Template Name: Contract Division Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$args                  = array(
	'hide_empty' => false,
	//default orderby name in ASC
);
$project_types         = get_terms( 'project_type', $args );
$first_section         = get_field( 'first_section_contract_division' );
$second_section        = get_field( 'second_section_contract_division' );
$second_section_text   = $second_section['text'];
$second_section_img_id = $second_section['image'];
$third_section         = get_field( 'third_section_contract_division' );
$third_section_text    = $third_section['text'];
$third_section_img_id  = $third_section['image'];
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

					<section class="section section-project-types bg-black">
						<div class="uk-container uk-text-center uk-text-uppercase">
							<div class="types uk-flex uk-flex-wrap uk-flex-center">
								<?php foreach ( $project_types as $type ) : ?>
									<a class="type text-white uk-text-light" href="<?php echo esc_url( get_term_link( $type->term_id ) ); ?>">
										<?php echo esc_html( $type->name ); ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					</section>

					<?php echo content_block_text_image_image( $first_section ); ?>

					<section class="section section-text section-second section-bg-gray uk-padding-large uk-padding-remove-horizontal uk-margin-large-bottom">
						<div class="uk-container uk-container-xlarge">
							<div class="max-width-740 remove-margin-from-last-el uk-text-light uk-margin-medium-bottom">
								<?php echo wp_kses_post( $second_section_text ); ?>
							</div>
							<figure class="uk-margin-remove">
								<?php echo wp_get_attachment_image( $second_section_img_id, 'full' ); ?>
							</figure>
						</div>
					</section>

					<section class="section section-text section-third uk-margin-large-top uk-margin-large-bottom">
						<div class="uk-container uk-container-xlarge">
							<div class="uk-grid-large" uk-grid>
								<div class="uk-width-1-2@m uk-margin-auto-top">
									<div class="max-width-740 remove-margin-from-last-el uk-text-light uk-margin-bottom">
										<?php echo wp_kses_post( $third_section_text ); ?>
									</div>
								</div>
								<div class="uk-width-1-2@m uk-flex">
									<figure class="uk-flex uk-margin-remove">
										<?php echo wp_get_attachment_image( $third_section_img_id, 'full', false, array( 'class' => 'object-fit-cover' ) ); ?>
									</figure>
								</div>
							</div>
						</div>
					</section>

					<?php
					get_template_part( 'partials/content-blocks/mosaic-gallery' );
					?>
				</article>

				<?php
			endwhile;
		endif;
		?>
	</main>
</div>

<?php
get_footer();
