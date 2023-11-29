<?php
get_header();
$current_term      = $args['current_term'];
$current_term_id   = $current_term->term_id;
$current_term_name = $current_term->name;
$current_term_desc = $current_term->description;
$sub_cats          = get_terms(
	array(
		'child_of'   => $current_term_id,
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
	)
);
?>

<main class="site-main">
	<?php get_template_part( 'partials/content-blocks/hero-slider', null, array( 'current_term' => $current_term ) ); ?>
	<section class="section section-text uk-margin-large-top uk-margin-large-bottom">
		<div class="uk-container uk-container-large uk-text-center">
			<h1 class="font-weight-100">
				<?php echo esc_html( $current_term_name ); ?>
			</h1>
			<div class="remove-margin-from-last-el uk-text-light">
				<?php echo wp_kses_post( $current_term_desc ); ?>
			</div>
		</div>
	</section>

	<section class="section section-alternative-blocks section-sub-categories">
		<div class="uk-container uk-container-xlarge uk-margin-large-bottom">
			<?php
			foreach ( $sub_cats as $key => $sub_cat ) :
				$sub_cat_id   = $sub_cat->term_id;
				$acf_id       = $sub_cat->taxonomy . '_' . $sub_cat_id;
				$featured_img = get_field( 'featured_image', $acf_id );
				$alignment    = ( 0 === $key % 2 ) ? ' text-right@m' : '';
				$order        = ( 0 === $key % 2 ) ? 'uk-flex-right@m' : 'uk-flex-last uk-flex-first@m';
				?>
				<article id="term-<?php the_ID(); ?>">
					<div class="uk-flex-top uk-flex-between<?php echo esc_attr( $alignment ); ?>" uk-grid>
						<div class="uk-width-1-1 uk-width-2-3@m">
							<a href="<?php echo esc_url( get_term_link( $sub_cat_id ) ); ?>">
								<figure class="uk-margin-remove">
									<?php echo wp_get_attachment_image( $featured_img, 'full' ); ?>
								</figure>
							</a>
						</div>
						<div class="uk-width-1-1 uk-width-1-3@m uk-flex <?php echo esc_attr( $order ); ?>">
							<a class="post-title-wrapper text-black text-black-hover" href="<?php echo esc_url( get_term_link( $sub_cat_id ) ); ?>">
								<h2 class="font-weight-100 color-inherit uk-h1 uk-margin-remove">
									<?php echo esc_html( $sub_cat->name ); ?>
								</h2>
							</a>
						</div>
					</div>
				</article>
				<?php
			endforeach;
			?>

		</div>
	</section>

</main>

<?php
get_footer();
