<?php get_header(); ?>
<h1>index</h1>

<?php
		wp_nav_menu( array(
			'theme_location' => 'main-menu',
        	'walker'  =>  new Walker_Custom_Menu(get_the_ID()), //use our custom walker
        	'container' => 'nav',
        ) );
	?>

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
		<?php if ( is_active_sidebar( 'sidebar' ) ) :
			dynamic_sidebar( 'sidebar' );
		endif; ?>
	</aside>

</section>
<?php get_footer(); ?>