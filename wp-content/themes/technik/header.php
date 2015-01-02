<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<?php wp_head(); ?>
</head>
<body>
<div class="bg-image-blur js-parallax"></div>
<div class="container bg-image">

<div id="header">
	<header>
	
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container_class' => 'menu',
		
	) );
	?>
	</header>

</div>
