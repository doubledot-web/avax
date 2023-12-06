<?php
$related_brand_id = get_field( 'related_brand' )->term_id;
$acf_term_id      = 'product_brand_' . $related_brand_id;
$brand_logo_id    = get_field( 'logo', $acf_term_id );
?>

<section class="section section-text uk-margin-large-top uk-margin-xlarge-bottom">
	<div class="uk-container uk-container-xlarge">
		<div class="uk-grid-large" uk-grid>
			<div class="uk-width-1-2@m">
				<div class="max-width-740 remove-margin-from-last-el uk-text-light">
					<figure class="uk-margin-remove">
						<?php echo wp_get_attachment_image( $brand_logo_id, 'full' ); ?>
					</figure>
					<?php the_content(); ?>
				</div>
			</div>
			<div class="uk-width-1-2@m uk-flex uk-flex-right@m">
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
		</div>
	</div>
</section>
