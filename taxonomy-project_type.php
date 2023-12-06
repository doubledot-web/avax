<?php
get_header();
$args             = array(
	'hide_empty' => false,
);
$project_types    = get_terms( 'project_type', $args );
$current_term     = get_queried_object();
$current_term_id  = $current_term->term_id;
$current_page_url = get_term_link( $current_term_id );
?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<section class="section section-project-types bg-black uk-margin-large-bottom">
			<div class="uk-container uk-text-center uk-text-uppercase">
				<div class="types uk-flex uk-flex-wrap uk-flex-center">
					<?php
					foreach ( $project_types as $type ) :
						$type_link    = get_term_link( $type->term_id );
						$active_class = $current_page_url === $type_link ? 'text-gray' : 'text-white';
						?>
						<a class="type <?php echo esc_attr( $active_class ); ?> uk-text-light" href="<?php echo esc_url( $type_link ); ?>">
							<?php echo esc_html( $type->name ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<section class="section section-alternative-blocks section-projects uk-margin-large-bottom">
			<div class="uk-container uk-container-xlarge">
				<?php
				if ( have_posts() ) :
					$key = 0;
					while ( have_posts() ) :
						the_post();
						$alignment = ( 0 === $key % 2 ) ? ' text-right@m' : '';
						$order     = ( 0 === $key % 2 ) ? 'uk-flex-right@m' : 'uk-flex-last uk-flex-first@m';
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="uk-flex-top uk-flex-between<?php echo esc_attr( $alignment ); ?>" uk-grid>
								<div class="uk-width-1-1 uk-width-2-3@m">
									<a href="<?php the_permalink(); ?>">
										<figure class="uk-margin-remove">
											<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) ); ?>
										</figure>
									</a>
								</div>
								<div class="uk-width-1-1 uk-width-1-3@m uk-flex <?php echo esc_attr( $order ); ?>">
									<a class="text-black text-black-hover text-shadow-hover" href="<?php the_permalink(); ?>">
										<h2 class="font-weight-100 color-inherit uk-h1 uk-margin-remove"><?php the_title(); ?></h2>
										<?php if ( has_excerpt() ) : ?>
											<p class="font-weight-100 color-inherit uk-h2 uk-margin-remove">
												<?php echo esc_html( get_the_excerpt() ); ?>
											</p>
										<?php endif; ?>
									</a>
								</div>
							</div>
						</article>
						<?php
						$key++;
					endwhile;
					get_template_part( 'partials/posts-pagination' );
				endif;
				?>
			</div>
		</section>
	</main>
</div>

<?php
get_footer();
