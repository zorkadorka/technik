<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package dajaky
 * @subpackage technik
 * @since Technik
 */
?>

<?php if ( is_active_sidebar( 'sidebar' ) ) :
		dynamic_sidebar( 'sidebar' );
	endif; ?>

