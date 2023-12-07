<?php
get_header();
?>

<div id="primary" class="content-area uk-padding-large uk-padding-remove-horizontal">
	<main id="site-main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="uk-container uk-container-xlarge">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;
		endif;
		?>
	</main>
</div>

<?php
get_footer();
