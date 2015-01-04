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
<div class="bg-image-blur js-parallax"></div>
<div class="container bg-image">

<header>
	
	<hgroup>
		<h1>FS Technik</h1>
		<img src="<?= get_bloginfo('template_url') ?>/images/logo-cropped.png" alt="technik-logo" class="technik-logo">
		<h2>Slovak folklore ensemble</h2>
	</hgroup>

	
</header>


<section id="body">
<?php
		$menu = is_user_logged_in() ? 'Main Menu loggedIn' : 'Main Menu';
		wp_nav_menu( array( 
			'menu' => $menu, 
			'theme_location' => 'primary',
			'container_class' => 'menu',
			'container' => 'nav',  ) 
		);
	?>