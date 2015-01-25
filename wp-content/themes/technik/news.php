<?php
/*
Template Name: Aktuality
*/
?>
 
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

<div class="news-content">
	<?php the_content(); ?>
</div>

<?php
	} // end while
} // end if
?>

<?php
/*
 * tu si nasledne vytiahneme vsetky posty ktore mame,
 * bez statickych stranok
 *
 * Pozn.: normalne sa vsade na forach a oficialnych strankach pouziva funkcia
 * get_query_var('nieco') na ziskanie premennej ktora urci na ktorej stranke sa 
 * nachadzame. Problem je v tom, ze tato funkcia akosi nefunguje na statickych strankach
 * takze sa musime spolahnut na "Them ol' goode PHP" a pouzit $_GET['nieco']
 *
 * Pozn. 2.: nastavenie post_per_page musi korespondovat s nastavenim v dashboarde
 * inak sa zobrazi pocet prispevkov na stranke tak ako je nastavene tu, ale pocet stranok
 * odpoveda poctu v dashboarde... just let that sink in
 */ 

wp_reset_query();

$posts_per_page = get_option('posts_per_page');



$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$settings = array(	'posts_per_page' => $posts_per_page,
					'post_type'      => 'post',
					'paged' => $paged,);
query_posts('post_type=post&paged='. $paged);
$posts = get_posts($settings);
$count = count($posts);
foreach ($posts as $index => $post): setup_postdata($post);
?>
	<div class="post">
		<h2><?php the_title(); ?></h2>
		<p class="date"><?php the_date() ?></p>
		<div class="post-image thumbnail"><a href="<?= get_permalink($post->ID) ?>"><?php the_post_thumbnail() ?></a></div>
		<?php the_excerpt() ?>
	</div>

<?php 
	if ($index + 1  != $count):
?>
		<div class="separator gradient"></div>
<?php 
	else:
?>
		<div class="separator transparent"></div>
<?php
	endif;
endforeach; 
?>

<div class="pagination">
<?php
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, $paged ),
	'total' => $wp_query->max_num_pages
) );
?>
</div>

</section>


</section><!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>



</div> <!-- .wrap -->

<h1>news</h1>
<?php get_footer(); ?>