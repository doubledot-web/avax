<?php
$all_posts_count        = get_all_posts();
$all_posts_current_page = get_all_posts_current_page();
//$posts_per_page  = get_query_var( 'posts_per_page' );

if ( $all_posts_count > $all_posts_current_page ) :
	?>
	<section class="section section-posts-pagination uk-margin-large-top uk-text-center">
		<nav class="navigation pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'wpcanvas' ); ?>">
			<h3 class="screen-reader-text">
				<?php esc_html_e( 'Posts pagination', 'wpcanvas' ); ?>
			</h3>
			<div class="nav-links">
				<?php
				echo paginate_links(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Newer Posts', 'wpcanvas' ) . '</span><svg width="14" height="24" aria-hidden="true"><use xlink:href="#slider-prev-arrow"></use></svg>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Older Posts', 'wpcanvas' ) . '</span><svg width="14" height="24" aria-hidden="true"><use xlink:href="#slider-next-arrow"></use></svg></span>',
					)
				);
				?>
			</div>
		</nav>
	</section>
	<?php
endif;
