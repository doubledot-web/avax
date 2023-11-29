<?php
/*
Template Name: Contract Division Page
For more info: http://codex.wordpress.org/Page_Templates
*/

get_header();
$args          = array(
	'hide_empty' => false,
);
$project_types = get_terms( 'project_type', $args );
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

				<section class="section uk-margin-large-top uk-margin-large-bottom">
					<div class="uk-container uk-container-xlarge">
						<h2 class="font-weight-100 uk-h1">Customized Design</h2>
						<div class="remove-margin-from-last-el uk-text-light uk-margin-bottom">
						Our Contract Division can engage in productive and vibrant
partnerships with designers, construction firms, and shipbuilders to conceive and build interior fixtures and decor. Our designs are tailored to meet particular requests and we offer all of the necessary support to ensure the success of the project.
						</div>
						<figure class="uk-margin-remove">
							<img src="http://localhost/avax/wp-content/uploads/2023/11/contract-division-img-3.jpg" alt="">
						</figure>
					</div>
				</section>

				<section class="section uk-margin-large-top uk-margin-large-bottom">
					<div class="uk-container uk-container-xlarge">
						<div class="uk-flex-bottom uk-grid-large" uk-grid>
							<div class="uk-width-1-2@s uk-margin-medium-bottom">
								<h2 class="font-weight-100 uk-h1">
									Request Our Tailor Made Technical Service
								</h2>
								<div class="remove-margin-from-last-el uk-text-light uk-margin-bottom">
								Depending on the project, our team is able to take on various
aspects of project management, including interior design, product development, logistics, and installation. We possess a strong drive for innovation, a legacy which has been a part of our company's DNA for 40 years. Thanks to our experience and know-how, our product proposal aims to satisfy our customers’ demand for customized, refined and timeless solutions.
								</div>
								<a class="uk-button uk-button-default uk-text-uppercase" href=""><?php esc_html_e( 'Contact us', 'wpcanvas' ); ?></a>
							</div>
							<div class="uk-width-1-2@s">
								<figure class="uk-margin-remove">
									<img src="http://localhost/avax/wp-content/uploads/2023/11/contract-division-img-4.jpg" alt="">
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

<?php
get_footer();
