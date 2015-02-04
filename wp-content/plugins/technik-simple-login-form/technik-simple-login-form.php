<?php 
/*
Plugin Name: Jarinov jednoduchy prihlasovací formulár
Description: widget pre zobrazovanie jednoduchého prihlasovacieho formualara
*/


class Technik_Simple_Login_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'Technik_Simple_Login_Widget', // Base ID
			__( 'Jarino login widget', 'text_domain' ), // Name
			array( 'description' => __( 'Jarinov Login Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		
		if (!is_user_logged_in())
			include 'views/login_form.html';
		else
			include 'views/logged_in.html';
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}


// register Foo_Widget widget
function register_login_widget() {
    register_widget( 'Technik_Simple_Login_Widget' );
}
add_action( 'widgets_init', 'register_login_widget' );


?>
