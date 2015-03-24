<?php

class Helper
{
	//
	// Vysklada meno pouzivatela v zavislosti od toho ci ma, alebo nema prezyvku
	//
	public static function get_user_name($user) {
		if (empty($user->nickname)) {
			return $user->first_name." ".$user->last_name; 
		}
		else {
			return $user->first_name." ".$user->nickname." ".$user->last_name;
		}
	}

	/**
	 * Ako argument zobere tagy ziskane z postu, prezre ich a pokúsi sa nájsť v nich ten
	 * čo je zadaný ako druhý argument
	 */
	public static function is_public_event($tags, $needle)
	{
		if (!is_array($tags)) return false;

		foreach ($tags as $index => $tag) {
			if (isset($tag->name) && $tag->name === $needle) {
					return true;
			}
		}
		return false;
	}

	
	/**
	 * Získa rolu používateľa
	 */
	public static function get_user_role() {
		global $current_user;
		if($current_user->ID && is_array($current_user->roles)){
			return $current_user->roles[0];
		}
	}

	public static function is_user_role($role) {
		global $current_user;
		if($current_user->ID && is_array($current_user->roles)){
			return $current_user->roles[0] == $role;
		}
	}

	// TODO REFACTOR TO HELPER CLASS
	public static function get_link_to_current_page($lang = 'sk') {
		return add_query_arg( array('lang' => $lang), NULL );
	}

	/*funkcia pre vytiahnutie udalosti s tagom verejne */
	public static function get_public_events(){
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

	public static function get_users_by_role($role){
	$arr = array (
			'role' => $role
		);
	$query = new WP_User_Query($arr);
	return $query->results;
}
}
