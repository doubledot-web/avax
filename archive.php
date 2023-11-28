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

<main class="site-main">
	<section class="section section-project-types bg-black">
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
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

			<?php
		endwhile;
	endif;
	?>
</main>

<?php
get_footer();
