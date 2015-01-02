<?php


/*
 * pridanie podpory pre editaciu menu v dashboarde
 */
function register_main_menu() {
	$menus = array(
		'main-menu' => __('Main Menu'),
		'o-nas-menu' => __('About menu'),
		'nacviky-menu' => __('Trainings menu'),
		'foto-video-menu' => __('Foto/video menu')
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


class Walker_Custom_Menu extends Walker {

	private $hidden = false;

	private $parent_page_id = 0;

	 // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'nav_menu_item', 
        'id'     => 'db_id' 
    );

	function __construct($id) {
		$this->parent_page_id = $id;	
	}

     /*
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
   function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
   		if ($item->post_parent == get_the_ID()) {
	        $output .= sprintf( "\n<li><a href='%s'%s>%s</a></li>\n",
	            $item->url,
	            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
	            $item->title.'  '.$item->post_parent
	        );
        }
    }
}