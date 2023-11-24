<?php get_header(); ?>

<div id="content" class="uk-container">

	<div id="inner-content" uk-grid>

		<main id="main" class="uk-width-2-3@m" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<h1 class="archive-title"><?php single_cat_title(); ?></h1>
			<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="article-header">
						<h1 class="post-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h1>
						
						<p class="post-meta">
							<?php echo __( 'Posted ', 'wpcanvas' ); ?><time datetime="<?php echo get_the_time( 'Y-m-d' ); ?>" itemprop="datePublished"><?php echo get_the_time( get_option( 'date_format' ) ); ?></time>

							<span><?php echo __( 'by', 'wpcanvas' ); ?></span> <span itemprop="author" itemscope itemptype="http://schema.org/Person"><?php echo get_the_author_link( get_the_author_meta( 'ID' ) ); ?></span>
						</p>
					</header>

					<section class="article-body">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						<?php the_excerpt(); ?>
					</section>

					<footer class="article-footer">
						<p><?php comments_number( __( '<span>No</span> Comments', 'wpcanvas' ), __( '<span>One</span> Comment', 'wpcanvas' ), __( '<span>%</span> Comments', 'wpcanvas' ) ); ?></p>

						<?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'wpcanvas' ) . '</span> ', ', ', '</p>' ); ?>
					</footer>

				</article>

			<?php endwhile; ?>

			<?php echo paginate_links(); ?>

			<?php else : ?>
				<article id="post-not-found" class="hentry cf">
					<header class="article-header">
						<h1><?php _e( 'Post Not Found!', 'wpcanvas' ); ?></h1>
					</header>
					<section class="article-body">
						<p><?php _e( 'Something is missing. Try double checking things.', 'wpcanvas' ); ?></p>
					</section>
				</article>
			<?php endif; ?>

		</main>

		<?php get_template_part( 'asides/sidebar' ); ?>

	</div>

</div>

<?php get_footer(); ?>
