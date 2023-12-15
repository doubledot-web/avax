<?php
function content_block_text_image_image( $block, $id = false ) {
	$section_id    = $id ? 'id="' . $id . '"' : '';
	$block_text    = $block['text'];
	$block_img1_id = $block['image1'];
	$block_img2_id = $block['image2'];
	?>
	<section <?php echo $section_id; ?>class="section section-text section-first uk-margin-large-top uk-margin-large-bottom">
		<div class="uk-container uk-container-xlarge pr-remove-horizontal@l">
			<div uk-grid>
				<div class="uk-width-1-2@l uk-width-expand@xl uk-flex">
					<div class="uk-flex uk-flex-column uk-flex-between@l uk-width-1-1">
						<div class="max-width-740 remove-margin-from-last-el uk-text-light">
							<?php echo wp_kses_post( $block_text ); ?>
						</div>
						<figure class="uk-flex uk-flex-right@l uk-margin-medium-top uk-margin-remove-bottom">
							<?php echo wp_get_attachment_image( $block_img1_id, 'full' ); ?>
						</figure>
					</div>
				</div>
				<div class="uk-width-1-2@l uk-width-auto@xl uk-flex uk-flex-right@l">
					<figure class="uk-flex uk-margin-remove">
						<?php echo wp_get_attachment_image( $block_img2_id, 'full', false, array( 'class' => 'object-fit-cover' ) ); ?>
					</figure>
				</div>
			</div>
		</div>
	</section>
	<?php
}


function print_radios( $terms, $tax, $query_arg ) {
	foreach ( $terms as $term_name ) :
		$term_obj  = get_term_by( 'name', $term_name, $tax );
		$term_id   = $term_obj->term_id;
		$term_slug = $term_obj->slug;
		$checked   = isset( $_GET[ $query_arg ] ) && $term_slug === $_GET[ $query_arg ] ? 'checked' : '';
		?>
		<div class="item">
			<input type="radio" name=<?php echo esc_attr( $query_arg ); ?> id="<?php echo esc_attr( $term_id ); ?>" value="<?php echo esc_attr( $term_slug ); ?>"<?php echo $checked; ?>>
			<label class="filter text-black text-black-hover text-shadow-light-hover uk-text-light uk-text-uppercase" for="<?php echo esc_attr( $term_id ); ?>">
			<?php echo esc_html( $term_name ); ?>
			</label>
		</div>
		<?php
	endforeach;
}
