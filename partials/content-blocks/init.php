<?php
if ( have_rows( 'content_blocks' ) ) :
	while ( have_rows( 'content_blocks' ) ) :
		the_row();
		$fields = json_encode( get_sub_field( 'fields' ) );
		$layout = str_replace( '_', '-', get_row_layout() );
		get_template_part( 'partials/content-blocks/' . $layout, null, $fields );
	endwhile;
endif;
