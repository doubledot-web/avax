<?php
get_header();
?>

<div id="primary" class="content-area">
	<main id="site-main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<section class="section section-text uk-padding-large uk-padding-remove-horizontal">
						<div class="uk-container uk-container-large uk-margin-remove-left uk-margin-remove-right">
							<div uk-grid>
								<div class="uk-width-1-2@s">
									<figure class="uk-flex uk-margin-remove">
										<?php
										the_post_thumbnail(
											'full',
											array(
												'loading' => 'lazy',
												'class'   => 'object-fit-cover',
											)
										);
										?>
									</figure>
								</div>
								<div class="uk-width-1-2@s">
									<h1 class="font-weight-100 uk-margin-remove">
										<?php the_title(); ?>
									</h1>
									<div class="text remove-margin-from-last-el uk-margin-top">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</section>
				</article>
				<?php
			endwhile;
		endif;
		?>
	</main>
</div>

<?php
get_footer();
