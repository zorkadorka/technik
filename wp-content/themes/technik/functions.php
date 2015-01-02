<?php


/*
 * pridanie podpory pre editaciu menu v dashboarde
 */
function register_main_menu() {
	register_nav_menu('main-menu',__('Main Menu'));
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