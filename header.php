<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="480">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<meta name="theme-color" content="#fff">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	get_template_part( 'partials/svg-sprites' );
	?>

	<div id="container"> <?php // closes in footer.php ?>
		<?php
		get_template_part( 'partials/main-header' );

