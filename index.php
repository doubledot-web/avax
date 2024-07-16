<?php
get_header();
$other     = get_field( 'other', 'option' );
$post_cats = get_categories(
	array(
		'hide_empty' => false,
	)
);
if ( is_home() ) :
	$show_all_posts = true;
	$current_url    = get_blog_page_url();
elseif ( is_category() ) :
	$show_all_posts = false;
	$current_url    = get_term_link( get_queried_object_id() );
endif;
?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<section class="section section-text uk-text-center uk-padding-large uk-padding-remove-horizontal">
			<div class="uk-container uk-container-large">
				<div class="remove-margin-from-last-el uk-text-center uk-text-light">
					<?php echo wp_kses_post( $other['blog_text'] ); ?>
				</div>
			</div>
		</section>

		<section class="section section-posts uk-margin-xlarge-bottom">
			<div class="uk-container uk-container-large">
				<div class="uk-inline">
					<button class="btn-base uk-text-uppercase uk-text-light uk-flex uk-flex-middle uk-margin-medium-bottom" type="button">
						<?php esc_html_e( 'Apply filters', 'wpcanvas' ); ?>
						<svg width="13" height="10" class="uk-margin-left" aria-hidden="true">
							<use xlink:href="#chevron-down-arrow"></use>
						</svg>
					</button>
					<div class="post-cats-dropdown" uk-dropdown="mode: click; pos: bottom-right">
						<?php $active_class = $show_all_posts ? ' text-gray' : ''; ?>
						<div class="filter<?php echo esc_attr( $active_class ); ?>">
							<a class="text-black<?php echo esc_attr( $active_class ); ?> uk-text-light uk-display-inline-block uk-text-uppercase" href="<?php echo esc_url( get_blog_page_url() ); ?>">
								<?php esc_html_e( 'All Categories', 'wpcanvas' ); ?>
							</a>
						</div>
						<?php
						foreach ( $post_cats as $cat ) :
							$cat_id       = $cat->term_id;
							$cat_slug     = $cat->slug;
							$cat_name     = $cat->name;
							$cat_link     = get_category_link( $cat_id );
							$active_class = $cat_link === $current_url ? ' text-gray' : '';
							if ( 'Uncategorized' === $cat_name ) :
								continue;
							endif;
							?>
							<div class="filter">
								<a class="text-black<?php echo esc_attr( $active_class ); ?> uk-text-light uk-display-inline-block uk-text-uppercase" href="<?php echo esc_url( $cat_link ); ?>">
									<?php echo esc_html( $cat_name ); ?>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<?php
				if ( have_posts() ) :
					?>
					<div class="uk-grid-large" uk-grid>
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<div class="uk-width-1-2@s">
								<?php
								get_template_part(
									'partials/post',
									null,
									array(
										'post_id' => get_the_ID(),
									)
								);
								?>
							</div>
							<?php
						endwhile;
						?>
					</div>
					<?php
					get_template_part( 'partials/posts-pagination' );
					?>
					<?php
				else :
					?>
					<p class="uk-text-light uk-margin-large-top">
						<?php esc_html_e( 'Sorry, but no posts found!', 'wpcanvas' ); ?>
					</p>
					<?php
				endif;
				?>

			</div>
		</section>
	</main>
</div>

<?php
get_footer();
