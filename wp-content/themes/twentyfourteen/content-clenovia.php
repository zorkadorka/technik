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
			echo get_avatar( 'zora.moravcikova@gmail.com', 50 );
			echo get_avatar( 'ahoj@mail.sk', 50 );
			$i = 1;	
			while( $user_info = get_userdata($i) ) :
				$i = $i +1;	
				echo get_avatar( $user_info->email, 50 );
			endwhile	

			//edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
