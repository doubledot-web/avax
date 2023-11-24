<?php $fields = json_decode( $args ); ?>

<div class="cnvs-text-block uk-container">
	<?php echo wp_kses_post( $fields->content ); ?>
</div>
