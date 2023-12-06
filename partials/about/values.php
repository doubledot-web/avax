<?php
$second_section      = get_field( 'second_section_about' );
$second_section_rows = $second_section['rows'];
?>

<section class="section section-text section-bg-gray uk-padding-large uk-padding-remove-horizontal uk-margin-large-bottom">
	<div class="max-width-1600 uk-container uk-margin-medium-top">
		<h2 class="font-weight-100 uk-h1 uk-text-center uk-margin-remove">
			<?php echo esc_html( $second_section['title'] ); ?>
		</h2>

		<div class="uk-margin-large-top uk-margin-medium-bottom" uk-grid>
			<?php foreach ( $second_section_rows as $row ) : ?>
				<div class="uk-width-1-2@m">
					<div class="max-width-740 remove-margin-from-last-el uk-text-light">
						<?php echo wp_kses_post( $row['left_column'] ); ?>
					</div>
				</div>
				<div class="uk-width-1-2@m">
					<div class="max-width-740 remove-margin-from-last-el uk-text-light">
						<?php echo wp_kses_post( $row['right_column'] ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
