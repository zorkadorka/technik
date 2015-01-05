<?php get_header(); ?>

<aside>
	<?php if ( is_active_sidebar( 'sidebar' ) ) :
		dynamic_sidebar( 'sidebar' );
	endif; ?>
</aside>

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



</section>
<h1>page - get_the_ID = <?= get_the_ID() ?>; post_parent_id <?= wp_get_post_parent_id(get_the_ID()) ?></h1>
<?php get_footer(); ?>