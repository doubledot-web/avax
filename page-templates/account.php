<?php
/*
Template Name: Account Page
For more info: http://codex.wordpress.org/Page_Templates
*/
get_header();
?>

<div id="primary" class="content-area uk-padding-large uk-padding-remove-horizontal uk-padding-remove-bottom uk-margin-xlarge-bottom">
	<main id="site-main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="uk-container uk-container-xlarge pr-remove-horizontal@xl">
						<div uk-grid>
							<div class="uk-width-expand@xl">
								<h1 class="font-weight-100 uk-margin-medium-bottom">
									<?php the_title(); ?>
								</h1>
								<?php the_content(); ?>
							</div>
							<div class="uk-width-auto@xl uk-flex-right@xl uk-visible@xl">
								<figure class="uk-text-center uk-margin-remove">
									<?php echo wp_get_attachment_image( 465, 'full' ); ?>
								</figure>
							</div>
						</div>
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
