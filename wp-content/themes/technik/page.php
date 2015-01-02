<?php get_header(); ?>

<h1>page</h1>
<section id="body">

<nav>
	<ul>
		<li><a href="#" class="active">História</a></li>
		<li><a href="#">Členovia</a></li>
		<li><a href="#">Program</a></li>
	</ul>
</nav>

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

<aside>
	<h2>Nadchádzajúce vystúpenia</h2>
	<ul>
		<li>Trenčín - 21.9.2015</li>
		<li>Motešice - 22.9.2015</li>
	</ul>
</aside>

</section>

<?php get_footer(); ?>