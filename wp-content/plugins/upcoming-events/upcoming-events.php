<?php 
/*
Plugin Name: Nadchádzajúce udalosti
Description: widget pre zobrazovanie nadchadzajucich udalostí
*/


class Technik_Upcoming_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'Technik_Upcoming_Widgetidget', // Base ID
			__( 'Nadchádzajúce udalosti', 'text_domain' ), // Name
			array( 'description' => __( 'Zobrazí všetky nadchádzajúce udalosti (TODO: implementovať aj treningy)', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		
		if (isset($instance['logged_only']) && $instance['logged_only'] && !is_user_logged_in()) {
			 	return;
		}
		// outputs the content of the widget
		$events = $this->get_events($instance);
		
		$this->check_empty_fields($instance, array('title' => 'Nadpis nezadaný'));

		echo $args['before_widget'];
		$this->print_event_list($events, $instance);
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Nadpis', 'text_domain' );

		$type = ! empty($instance['type']) ? $instance['type'] : 'vystupenie';

		$logged_only = ! empty($instance['logged_only']) ? true : false;

		/*
		funkcie _e a __ su wordpressovske funkcie urcene na preklad
		http://codex.wordpress.org/Function_Reference/_e
		*/
		include 'views/backend_form.php';
		
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
		$instance['logged_only'] = ( ! empty( $new_instance['logged_only'] ) ) ? true : false;

		return $instance;
	}

	private function get_events($instance) {
		/*
			JLO - refactor constants out
		*/

		$today = date( 'Y-m-d' );
		
		if(!is_user_logged_in()){
			$args = array(
				'post_type' => 'tribe_events',
				'tax_query' => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field' => 'slug',
						'terms' => $instance['type'] //'vystupenie',
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

		$args = array(
				'post_type' => 'tribe_events',
				'tax_query' => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field' => 'slug',
						'terms' => $instance['type'] //'vystupenie',
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

	private function print_event_list($list, $instance) {
		include 'views/event_list.php';
	}

	private function check_empty_fields(&$instance, $fields) {
		foreach ($fields as $key => $value) {
			if (empty($instance[$key])) {
				$instance[$key] = $value;
			}	
		}
		
	}
}


// register Foo_Widget widget
function register_upcoming_widget() {
    register_widget( 'Technik_Upcoming_Widget' );
}
add_action( 'widgets_init', 'register_upcoming_widget' );


?>