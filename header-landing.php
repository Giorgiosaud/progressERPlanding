<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<?php wp_head()?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
		<body>
			<header class="navbar-fixed-top">
				<?php get_template_part('navbar','top');?>
				<?php get_template_part('navbar','mainLanding');?>
			</header>
