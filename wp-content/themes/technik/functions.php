<?php

require_once('widgets/member_widget.php');

/*
 * dashboard cleanup for ordinary mortals
 */
add_action( 'admin_menu', 'edit_admin_menus', 999);
function edit_admin_menus()
{
	if ( current_user_can( 'manage_options' ) == FALSE )
	{
		remove_menu_page('index.php');
		remove_menu_page('upload.php');
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
}





/*
 * pridanie podpory pre editaciu menu v dashboarde
 */
function register_main_menu() {
	$menus = array(
		'main-menu' => __('Main Menu'),
		'o-nas-menu' => __('About menu'),
		'nacviky-menu' => __('Trainings menu'),
		'foto-video-menu' => __('Foto/video menu'),
		'secondary' => __('Left Menu'),
		);
	register_nav_menus($menus);
}
add_action('init', 'register_main_menu');

/*
 * pridanie podpory pre ukazky clankov
 */ 
function emw_add_excerpt_support () {
	add_post_type_support('page', 'excerpt');
}
add_action ('init', 'emw_add_excerpt_support');

//
// funkcia ktoru vyuzivaju excerpts a vracia link na detail postu
//
function new_excerpt_more($more) {
	global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Zobraziť viac...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// 
// pridanie podpory pre thumbnails featured obrazkov
//
add_theme_support( 'post-thumbnails' ); 


//
// uz neviem
//
ini_set( 'mysql.trace_mode', 0 );


//
// zaincludovanie jQuery
// pozn.: pouzil som verziu 1.11 kvoli podpore pre stare browsre,
// je otazne nakolko to ma zmysel, kedze v teme z lenivosti pouzivam css3 transitions
// kazdopadne API sa medzi verziami 1.11 a 2.0 nemeni, takze pripadna zmena by mala
// byt bezbolestna
//
function technik_scripts() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.1.min.js' );
	wp_enqueue_script( 'jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140918' );
	wp_enqueue_script( 'jquery-login-form', get_template_directory_uri() . '/js/login-form.js', array( 'jquery' ), '20140918' );
	//wp_enqueue_script( 'jquery-scrolling', get_template_directory_uri() . '/js/vertical-scroll.js', array( 'jquery' ), '20140918' );
	//wp_enqueue_script( 'jquery-oculus', get_template_directory_uri() . '/js/oculus.js', array( 'jquery' ), '20140918' );
	//wp_enqueue_script( 'draggable-logo', get_template_directory_uri() . '/js/draggable-logo.js', array( 'jquery' ), '20140125' );
}
add_action('wp_enqueue_scripts', 'technik_scripts');

//
// zaregistrovanie oblasti kam sa budu vykreslovat widgety
//
function register_sidebar_area() {
	register_sidebar( array(
		'name' => 'Right Sidebar',
		'id' => 'sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
		) );
}
add_action('widgets_init', 'register_sidebar_area');

//
// taka malickost na odstranenie nezmyselneho html { margin-top: 32px !important }
// thanks David Walsh http://davidwalsh.name/remove-wordpress-admin-bar-css
//
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function log_var($var) {
	echo '<pre>';
 	print_r($var);
 	echo '</pre>';
}

// This theme uses wp_nav_menu() in two locations. -- copied from twentyfourteen
	/*register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'technik' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'technik' ),
	) );*/




