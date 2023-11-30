<?php
$showroom_page_id = 29;
$showrooms        = get_pages(
	array(
		'parent' => $showroom_page_id,
	)
);
?>
<section class="section section-alternative-blocks section-text section-showrooms uk-margin-large-bottom">
	<div class="uk-container uk-container-xlarge">
		<div class="max-width-740 remove-margin-from-last-el uk-text-light uk-margin-medium-bottom">
			<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $showroom_page_id ) ); ?>
		</div>
		<?php
		$key = 0;
		foreach ( $showrooms as $showroom ) :
			$showroom_id = $showroom->ID;
			$alignment   = ( 0 === $key % 2 ) ? ' text-right@m' : '';
			$order       = ( 0 === $key % 2 ) ? 'uk-flex-right@m' : 'uk-flex-last uk-flex-first@m';
			?>
			<article id="post-<?php echo esc_attr( get_the_ID( $showroom_id ) ); ?>" <?php post_class(); ?>>
				<div class="uk-flex-top uk-flex-between<?php echo esc_attr( $alignment ); ?>" uk-grid>
					<div class="uk-width-1-1 uk-width-2-3@m">
						<a href="<?php echo esc_url( get_permalink( $showroom_id ) ); ?>">
							<figure class="uk-margin-remove">
								<?php echo get_the_post_thumbnail( $showroom_id, 'full', array( 'loading' => 'lazy' ) ); ?>
							</figure>
						</a>
					</div>
					<div class="uk-width-1-1 uk-width-1-3@m uk-flex uk-flex-column <?php echo esc_attr( $order ); ?>">
						<a class="post-title-wrapper text-black text-black-hover" href="<?php echo esc_url( get_permalink( $showroom_id ) ); ?>">
							<h3 class="font-weight-100 color-inherit uk-h1 uk-margin-remove">
								<?php echo esc_html( get_the_title( $showroom_id ) ); ?>
							</h3>
						</a>
						<div class="showroom-info remove-margin-from-last-el uk-text-light">
							<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $showroom_id ) ); ?>
						</div>
					</div>
				</div>
			</article>
			<?php
			$key++;
			endforeach;
		?>
	</div>
</section>
