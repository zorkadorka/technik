<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/nav.css" type="text/css" media="screen" />
	<?php wp_head(); ?>
</head>
<body>

<header>
	<div class="header-background">
		
	</div>

	<hgroup>
		<img src="<?= get_bloginfo('template_url') ?>/images/logo-cropped.png" alt="technik-logo" class="logo">
	</hgroup>	
	
</header>

<div class="wrap">

<section class="main-content">


<?php
	wp_nav_menu( array( 
		'menu' => 'Main Menu', 
		'theme_location' => 'primary',
		'container_class' => 'menu',
		'container' => 'nav',  ) 
	);
?>
