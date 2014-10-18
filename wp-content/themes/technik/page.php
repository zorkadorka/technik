<?php get_header(); ?>

<section class="content-wrapper">


<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

<div class="test">
	<?php the_content(); ?>
</div>


<?php
	} // end while
} // end if
?>

</section>

<?php get_footer(); ?>