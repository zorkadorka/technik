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
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>

