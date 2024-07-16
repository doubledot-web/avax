<?php
$args  = array(
	'posts_per_page' => 2,
	'post_status'    => 'publish',
	'orderby'        => 'rand',
	'post__not_in'   => array( get_the_ID() ),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
	<section class="section section-related uk-margin-large-bottom">
		<div class="uk-container uk-container-large">
			<h2 class="font-weight-100 uk-h1 uk-margin-remove-top uk-margin-medium-bottom">
				<?php esc_html_e( 'You might also like', 'wpcanvas' ); ?>
			</h2>

			<div class="uk-grid-large" uk-grid>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
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
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php
endif;
