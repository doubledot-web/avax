<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<section class="section section-intro uk-padding-large uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-large-bottom">
			<div class="uk-container uk-margin-remove-left uk-margin-remove-right">
				<h1 class="font-weight-100">
					<?php _e( 'Search results for', 'wpcanvas' ); ?>: <span class="search-term text-white bg-black uk-display-inline-block">
						<?php echo esc_html( get_search_query() ); ?>
					</span>
				</h1>
			</div>
		</section>

		<section class="section section-results uk-margin-xlarge-bottom">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="uk-container uk-margin-remove-left uk-margin-remove-right">
							<a class="text-black text-black-hover text-shadow-hover uk-display-inline-block uk-padding uk-padding-remove-horizontal" href="<?php the_permalink(); ?>">
								<div class="no-text-shadow uk-text-capitalize uk-text-light">
									<?php echo esc_html( get_post_type() ); ?>
								</div>
								<h2 class="font-weight-100 uk-margin-remove">
									<?php the_title(); ?>
								</h2>
							</a>
						</div>
					</article>
					<?php
				endwhile;
				get_template_part( 'partials/posts-pagination' );
			else :
				?>
				<div class="uk-container uk-container-large uk-h3 uk-text-light">
					<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wpcanvas' ); ?>
				</div>
				<?php
			endif;
			?>
		</section>
	</main>
</div>

<?php
get_footer();
