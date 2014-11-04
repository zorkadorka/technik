<?php
/**
 * The template used for displaying users
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		//twentyfourteen_post_thumbnail();
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">
		<?php
			//the_content();
			/*$i = 1;	
			while( $user_info = get_userdata($i) ) :
				$i = $i +1;	
				echo get_avatar( $user_info->email, 50 );
			endwhile	
*/

			$users = get_users( );
			foreach ($users as $user) {
				echo $user->user_nicename;
				echo get_avatar( $user->user_email, 50 );
			}
			//edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
