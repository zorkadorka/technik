<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href='http://fonts.googleapis.com/css?family=Pontano+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/nav.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/gallery.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/login-form.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/members.css" type="text/css" media="screen" />
	<?php wp_head(); ?>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>

<header>
	<div class="header-background">
	</div>

	<hgroup>
		<img src="<?= get_bloginfo('template_url') ?>/images/logo-cropped.png" alt="technik-logo" class="logo">
		<h1>FS Technik STU</h1>
	</hgroup>	
	
</header>

<div class="body-background "></div>

<div class="wrap">

<div class="languages">
	<a href="<?= Helper::get_link_to_current_page('sk') ?>"><img src="<?= get_bloginfo('template_url') ?>/images/langs/sk.gif"></a>
	<a href="<?= Helper::get_link_to_current_page('en') ?>"><img src="<?= get_bloginfo('template_url') ?>/images/langs/en.gif"></a>
	<!--<a href="<?= Helper::get_link_to_current_page('de') ?>"><img src="<?= get_bloginfo('template_url') ?>/images/langs/de.gif"></a>-->
</div>

<section class="content main-content">


<?php
	wp_nav_menu( array( 
		'menu' => 'Main Menu', 
		'theme_location' => 'primary',
		'container_class' => 'menu',
		'container' => 'nav',  ) 
	);
?>

