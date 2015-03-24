<?php

require_once('widgets/member_widget.php');

require_once( TEMPLATEPATH . '/lib/helper.php' );

require_once( TEMPLATEPATH . '/lib/avatar_manager_overrides.php');

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
	wp_enqueue_script( 'jquery-ajax-calls', get_template_directory_uri() . '/js/ajax-calls.js', array( 'jquery' ), '20140918' );
	wp_localize_script( 'jquery-ajax-calls', 'membersAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
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


/*add_action( 'show_user_profile', 'add_nickname_custom_field' );
add_action( 'edit_user_profile', 'add_nickname_custom_field' );*/

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
/*add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );*/

function save_extra_user_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) { 
		return false; 
	}
	update_user_meta( $user_id, 'prezyvka', $_POST['prezyvka'] );
	update_user_meta( $user_id, 'telephone', $_POST['telephone']);
	$pretty_name = $_POST['first_name'] . ' '. $_POST['prezyvka'] . ' ' . $_POST['last_name'];
	wp_update_user( array ('ID' => $user_id, 'display_name'=> $pretty_name) ) ;
}

// TODO REFACTOR TO HELPER CLASS
function get_user_prezyvka($user_id){
	return esc_attr( get_user_meta($user_id,'prezyvka', true) ); 
}



add_action( 'admin_footer-user-edit.php', 'custom_edit_profile_page' );
add_action( 'admin_footer-profile.php', 'custom_edit_profile_page' );
add_action( 'admin_footer-user-new.php', 'custom_edit_profile_page' );

// Print jQuery that removes unneeded elements
function custom_edit_profile_page(){
	?>
	<div id="hidden_user_role" class="hidden">
		<h1><?= Helper::get_user_role() ?></h1>
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

add_action('wp_ajax_delete_avatar', 'delete_avatar');
add_action('wp_ajax_nopriv_delete_avatar', 'delete_avatar_nopriv');

function delete_avatar() {
	global $current_user;
	get_currentuserinfo();
	echo 'text';
	AvatarManagerOverrides::avatar_manager_delete_avatar($current_user->ID);

	die();
}

function delete_avatar_nopriv() {
	echo 'Get out';
}


add_action('admin_post_update_user', 'update_user');


function update_user() {
	
	global $current_user;
	get_currentuserinfo();

	$fields = array(
		'first_name', 
		'last_name', 
		'nickname',
		'description',
		'phone1',
		'user_email',
		);
	$userdata = post_request_to_userdata($fields, $_POST);

	// NOTE
	// do wp_update_user by sa dal pre pohodlnost rovno poslat
	// $_POST objekt a nemusel by som si ani robit starost
	// s mapovanim jednotlivych poli...
	// problem je, ze vo wp_update_user viem zmenit aj rolu pouzivatela
	// a potom by sa nejaky spekulant vedel temperingom stat adminom...
	
	wp_update_user($userdata);

	update_user_meta(get_current_user_id(), 'phone1', $_POST['phone1']);

	// ak su vyplnene polia pre hesla, tak skusime updatetnut

	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	if (!empty($old_pass) && !empty($new_pass)) 
	{
		echo $current_user->user_pass;

		if (wp_check_password($old_pass, $current_user->user_pass, $current_user->ID)) {
			wp_set_password($new_pass, $current_user->ID);

			//
			// ked sa zmeni heslo, wordpress automaticky odfajci prihlasenie
			// takze treba pred presmerovanim usera znova prihlasit, tentoraz
			// uz s novym heslom
			//
			wp_signon(array(
				'user_login' => $current_user->user_login,
				'user_password' => $new_pass), 
			true);
		}
	}

	AvatarManagerOverrides::avatar_manager_edit_user_profile_update($current_user->ID, $_POST,$_FILES, $_GET);

	wp_redirect( get_page_link(664) );
}

function post_request_to_userdata($array_of_fields, $post_request)
{
	$userdata = array('ID' => get_current_user_id());
	foreach ($array_of_fields as $value) {
		$userdata[$value] = $post_request[$value];
	}
	return $userdata;
}

require_once( TEMPLATEPATH . '/lib/helper.php' );
