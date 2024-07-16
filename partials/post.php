<?php
$post_id = $args['post_id'];
?>

<article id="post-<?php echo esc_attr( $post_id ); ?>" <?php post_class( '', $post_id ); ?>>
	<a class="text-shadow-hover" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
		<figure class="uk-margin-remove">
			<?php
			echo get_the_post_thumbnail(
				$post_id,
				'full',
				array(
					'loading' => 'lazy',
					'class'   => 'object-fit-cover uk-width-1-1',
				)
			);
			?>
		</figure>
		<div class="post-info uk-margin-top">
			<time class="text-black no-text-shadow uk-display-inline-block uk-text-light uk-margin-small-bottom" datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>">
				<?php echo esc_html( get_the_date( 'd F Y', $post_id ) ); ?>
			</time>
			<h2 class="font-weight-100 uk-margin-remove">
				<?php echo esc_html( get_the_title( $post_id ) ); ?>
			</h2>
		</div>
	</a>
</article>
