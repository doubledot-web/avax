<?php get_header(); ?>

<div id="content" class="uk-container">

	<div id="inner-content" uk-grid>

		<main id="main" class="uk-width-2-3@m" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="article-header">
						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
					</header>

					<section class="article-body">
						<p class="post-meta">
							<?php echo __( 'Posted ', 'wpcanvas' ); ?><time datetime="<?php echo get_the_time( 'Y-m-d' ); ?>" itemprop="datePublished"><?php echo get_the_time( get_option( 'date_format' ) ); ?></time>

							<span><?php echo __( 'by', 'wpcanvas' ); ?></span> <span itemprop="author" itemscope itemptype="http://schema.org/Person"><?php echo get_the_author_link( get_the_author_meta( 'ID' ) ); ?></span>
						</p>

						<?php the_content(); ?>
					</section>

					<footer class="article-footer">
						<?php printf( __( 'filed under', 'wpcanvas' ) . ': %1$s', get_the_category_list( ', ' ) ); ?>
						<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'wpcanvas' ) . '</span> ', ', ', '</p>' ); ?>
					</footer>

					<?php // comments_template(); ?>

				</article>

			<?php endwhile; ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry cf">
					<header class="article-header">
						<h1><?php _e( 'Post Not Found!', 'wpcanvas' ); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e( 'Something is missing. Try double checking things.', 'wpcanvas' ); ?></p>
					</section>
				</article>

			<?php endif; ?>

		</main>

		<?php get_template_part( 'asides/sidebar' ); ?>

	</div>

</div>

<?php get_footer(); ?>
