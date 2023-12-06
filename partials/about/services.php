<?php
$third_section = get_field( 'third_section_about' ); ?>

<section id="our-services" class="section section-text section-services uk-margin-xlarge-bottom">
	<div class="uk-container uk-container-xlarge pr-remove-horizontal@l">
		<div class="uk-grid-large" uk-grid>
			<div class="uk-width-1-2@m uk-margin-auto-top">
				<div class="max-width-740 remove-margin-from-last-el uk-text-light">
					<?php echo wp_kses_post( $third_section['text'] ); ?>
				</div>
			</div>
			<div class="uk-width-1-2@m uk-flex uk-flex-right@m">
				<figure class="uk-flex uk-margin-remove">
					<?php echo wp_get_attachment_image( $third_section['image'], 'full', false, array( 'class' => 'object-fit-cover' ) ); ?>
				</figure>
			</div>
		</div>
	</div>
</section>
