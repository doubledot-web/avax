<?php
$full_width_img = get_field( 'fullwidth_image' );
if ( $full_width_img ) :
	?>
	<div class="uk-container uk-container-expand uk-padding-remove">
		<figure class="uk-margin-remove">
	<?php
	echo wp_get_attachment_image(
		$full_width_img,
		'full',
		false,
		array( 'class' => 'uk-width-1-1' )
	);
	?>
		</figure>
	</div>
	<?php
endif;
