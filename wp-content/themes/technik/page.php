<?php get_header(); ?>

<section class="posts">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>


	<article>
		<?php the_content(); ?>
	</article>
<?php
	} // end while
} // end if
?>
</section>



</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php if ( is_active_sidebar( 'sidebar' ) ) :
		dynamic_sidebar( 'sidebar' );
	endif; ?>
</aside>

</div> <!-- .wrap -->

<<<<<<< HEAD
=======
<h1 class="dev-page-type">page</h1>
>>>>>>> 2adaa110b4dba5cf45760d41be0b6685b661e3c1
<?php get_footer(); ?>