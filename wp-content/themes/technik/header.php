<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/nav.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/oculus.css" type="text/css" media="screen" />
	<?php wp_head(); ?>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>

<header>
	<div class="header-background">
	<div class="oculus"></div>	
	</div>

	<hgroup>
		<img src="<?= get_bloginfo('template_url') ?>/images/logo-cropped.png" alt="technik-logo" class="logo">
		<h1>Slovak folklore ensemble Technik</h1>
	</hgroup>	
	
</header>

<div class="body-background "></div>

<div class="wrap">

<section class="content main-content">


<?php
	wp_nav_menu( array( 
		'menu' => 'Main Menu', 
		'theme_location' => 'primary',
		'container_class' => 'menu',
		'container' => 'nav',  ) 
	);
?>
