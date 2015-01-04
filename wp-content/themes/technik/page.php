<?php get_header(); ?>


<?php
/*		wp_nav_menu( array(
			'theme_location' => 'main-menu',
        	'walker'  =>  new Walker_Custom_Menu(get_the_ID()), //use our custom walker
        	'container' => 'nav',
        ) );*/
	?>

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
<h1>page - get_the_ID = <?= get_the_ID() ?>; post_parent_id <?= wp_get_post_parent_id(get_the_ID()) ?></h1>
<?php get_footer(); ?>