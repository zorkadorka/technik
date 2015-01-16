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

<aside>
	<?php if ( is_active_sidebar( 'sidebar' ) ) :
		dynamic_sidebar( 'sidebar' );
	endif; ?>
</aside>

</div> <!-- .wrap -->

<h1>index</h1>
<?php get_footer(); ?>

