<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<?php wp_head(); ?>
</head>
<body>
<div class="white-overlay"></div>

<div id="container">
<header>
<h1>
	FS Technik
</h1>
<h3>Slovak Folklore Ensemble</h3>

</header>

 <?php wp_nav_menu(array('container_class' => 'menu' )); ?>