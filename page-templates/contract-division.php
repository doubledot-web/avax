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
