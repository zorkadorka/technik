<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package dajaky
 * @subpackage technik
 * @since Technik
 */
?>
<div id="secondary">
	<?php if (is_user_logged_in() ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		
		<?php
			$menu = 'Left menu';
			wp_nav_menu( array( 'menu' => $menu, 'theme_location' => 'secondary', 'menu_class' => 'nav-menu' ) );
		?>;
		

		<!-- <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?> -->
	</nav>
	<?php endif; ?>

	
</div><!-- #secondary -->
