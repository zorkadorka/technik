<?php get_header(); ?>

<section class="content-wrapper">

<?php 
/*
 * v tomto radoby cykle sa zobrazi obsah stranky Aktuality
 * tak ako sa da editovat v backende stranky
 */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>


<div class="post">
	<h2><?php the_title(); ?></h2>
	<small><i><?php the_date() ?></i></small>
	<p>
		<span class="post-image full-image"><?php the_post_thumbnail() ?></span>
		<?php the_content() ?>
	</p>
</div>

<p>
	<a href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">Návrat na aktuality</a>
</p>

<?php
} // while
} // if
?>

</section>


<?php get_footer(); ?>