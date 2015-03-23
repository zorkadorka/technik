<?php

require_once('widgets/member_widget.php');



/*
 * redirect to homepage after "Naozaj sa chcete odhlasit?" page
 * however, this page is not in use 
 */
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

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
	//wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js');
	//wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.easing-1.4.pack.js');
	wp_enqueue_script( 'jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140918' );
	wp_enqueue_script( 'jquery-login-form', get_template_directory_uri() . '/js/login-form.js', array( 'jquery' ), '20140918' );
	wp_enqueue_script( 'jquery-members', get_template_directory_uri() . '/js/members.js', array( 'jquery' ), '20140918' );
	wp_localize_script( 'jquery-members', 'membersAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
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

/*funkcia pre vytiahnutie udalosti s tagom verejne */

function get_public_events(){
	$today = date( 'Y-m-d' );
		
	$args = array(
		'post_type' => 'tribe_events',
		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'slug',
				'terms' => 'vystupenie' 
				),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => 'verejne'
				)
			),
		'meta_query' => array(
			        array(
			            'key' => '_EventStartDate',
			            'value' => $today,
			            'compare' => '>=',
			            'type' => 'DATE'
			        )
			    ),
		'orderby' => '_EventStartDate',
		'order' => 'ASC',
		
	);
	$query = new WP_Query($args);
	return $query->get_posts();
}

function get_my_users($role){
	$arr = array (
			'role' => $role
		);
	$query = new WP_User_Query($arr);
	return $query->results;

}

add_action( 'show_user_profile', 'add_nickname_custom_field' );
add_action( 'edit_user_profile', 'add_nickname_custom_field' );

function add_nickname_custom_field( $user ) { ?>

	<table id="custom_fields_profile">
		<tbody>
			<tr id="prezyvka_tr">
				<th><label for="prezyvka">Prezyvka</label></th>

				<td>
					<input type="text" name="prezyvka" id="prezyvka" value="<?php echo get_user_prezyvka( $user->ID); ?>" class="regular-text" />
					<br />
					<span class="description"><?php _e("Pogo, this is for you"); ?></span>
				</td>
			</tr>
			<tr id="telephone_tr">
			<th><label for="telephone">Telefón</label></th>

			<td>
				<input type="text" name="telephone" id="telephone" value="<?php echo esc_attr( get_user_meta($user->ID,'telephone', true) ); ?>" 
				 class="regular-text" />
				<br />
				<span class="description"></span>
			</td>
		</tr>
		</tbody>
	</table>

	
<?php 
}
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) { 
		return false; 
	}
	update_user_meta( $user_id, 'prezyvka', $_POST['prezyvka'] );
	update_user_meta( $user_id, 'telephone', $_POST['telephone']);
	$pretty_name = $_POST['first_name'] . ' '. $_POST['prezyvka'] . ' ' . $_POST['last_name'];
	wp_update_user( array ('ID' => $user_id, 'display_name'=> $pretty_name) ) ;
}

function get_user_prezyvka($user_id){
	return esc_attr( get_user_meta($user_id,'prezyvka', true) ); 
}

function get_user_role() {
	global $current_user;
	if($current_user->ID && is_array($current_user->roles)){
		return $current_user->roles[0];
	}
}

function get_link_to_current_page($lang = 'sk') {
	return add_query_arg( array('lang' => $lang), NULL );
}

add_action( 'admin_footer-user-edit.php', 'custom_edit_profile_page' );
add_action( 'admin_footer-profile.php', 'custom_edit_profile_page' );
add_action( 'admin_footer-user-new.php', 'custom_edit_profile_page' );

// Print jQuery that removes unneeded elements
function custom_edit_profile_page(){
	?>
	<div id="hidden_user_role" class="hidden">
		<h1><?php echo get_user_role() ?></h1>
	<div>
	<script type="text/javascript" src="<?= get_bloginfo('template_url') ?>/js/user-edit.js"></script>

	<?php
}

add_action( 'admin_footer-post.php', 'custom_edit_event_page' );
add_action( 'admin_footer-post-new.php', 'custom_edit_event_page' );

// Print jQuery that removes unneeded elements
function custom_edit_event_page(){
	?>
	<script type="text/javascript" src="<?= get_bloginfo('template_url') ?>/js/event-edit.js"></script>
	<?php
}

//
// Custom field for adding public info of event
//
add_action( 'add_meta_boxes', 'event_public_info_metabox' );              
function event_public_info_metabox() 
{   
    add_meta_box('event_public_info', 'Verejné info o udalosti', 'output_public_info_metabox', 'tribe_events');
}

function output_public_info_metabox( $post ) 
{
	$settings = array(
		'textarea_name'=>'event_public_info_input');

	
	$prefill_content = '';

	if (array_key_exists('post', $_GET)) {
		$value =  get_post_meta($_GET['post'], '_EventPublicInfo' , true );
		$prefill_content = htmlspecialchars_decode($value);
	}

	wp_editor($prefill_content , 'mettaabox_ID_stylee', $settings );	
}


function save_my_postdata( $post_id ) 
{                   
	if (!empty($_POST['event_public_info_input']))
	{
	    $data = htmlspecialchars($_POST['event_public_info_input']);
	    update_post_meta($post_id, '_EventPublicInfo', $data );
	}
}
add_action( 'save_post', 'save_my_postdata' );  


/**
 * Ako argument zobere tagy ziskane z postu, prezre ich a pokúsi sa nájsť v nich ten
 * čo je zadaný ako druhý argument
 */
function is_public_event($tags, $needle)
{
	if (!is_array($tags)) return false;

	foreach ($tags as $index => $tag) {
		if (isset($tag->name) && $tag->name === $needle) {
				return true;
		}
	}
	return false;
}

add_action('wp_ajax_demo', 'handle_demo');
add_action('wp_ajax_nopriv_demo', 'handle_demo');

function handle_demo() {
	// ??????
	if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_user_vote_nonce")) {
		exit("No naughty business please");
	}

	$user_id = $_REQUEST["user_id"];

	$description = get_user_meta($user_id, 'description', true);


	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		// ak je AJAXovy request
	  $res = json_encode(array(
	  	'description' => $description,
  	));

  	echo $res;
	}
	else {
		// ak nie je AJAXovy request
	  header("Location: ".$_SERVER["HTTP_REFERER"]);
	}

	die();
}