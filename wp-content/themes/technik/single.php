<?php get_header(); ?>

<section class="post">

<?php 
/*
 * v tomto radoby cykle sa zobrazi obsah stranky Aktuality
 * tak ako sa da editovat v backende stranky
 */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>


<article>
	<h2><?php the_title(); ?></h2>
	<small><i><?php the_date() ?></i></small>
	<p class="featured-image">
		<span class="post-image full-image"><?php the_post_thumbnail() ?></span>
		<?php the_content() ?>
	</p>
</article>

<p>
	<a href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">Návrat na aktuality</a>
</p>

<?php
} // while
} // if
?>

</section>

</section><!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>



</div> <!-- .wrap -->

<h1 class="dev-page-type">single</h1>
<?php get_footer(); ?>