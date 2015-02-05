<?php

class Technik_Member_Menu_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'Technik_Member_Menu_Widget', // Base ID
			__( 'Menu pre členov', 'text_domain' ), // Name
			array( 'description' => __( 'Widget ktory zobrazuje menu pre prihlasenych', 'text_domain' ), ) // Args
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
		?>

		<?php if (is_user_logged_in() ) : ?>
		<nav role="navigation" class="navigation site-navigation secondary-navigation">
			
			<?php
				$menu = 'Left menu';
				wp_nav_menu( array( 
					'menu' => $menu, 
					'theme_location' => 'secondary', 
					'menu_class' => 'nav-menu',
					'container_class' => 'member-menu',
					'container' => 'nav', ) );
			?>
			

			
					
			<!-- HTML kod vygenerovany funkciou hore, musel som zmenit link na Profil a nevedel som ako inak to spravit -
			<nav class="member-menu">
				<ul id="menu-left-menu" class="nav-menu">
					<li id="menu-item-427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-427">
						<a href="http://localhost/technik/events">Kalendár</a>
					</li>
					<li id="menu-item-410" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-410">
						<a href="http://localhost/technik/wp-admin/profile.php">Profil</a>
					</li>
				</ul>
			</nav>	
-->

		</nav>
		<?php endif; ?>

		<?php

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
function register_member_menu_widget() {
    register_widget( 'Technik_Member_menu_Widget' );
}
add_action( 'widgets_init', 'register_member_menu_widget' );
