<?php
/*
Template Name: predstavenia
*/

get_header(); ?>

<section class="predstavenia">
	<h1>Môžete nás vidieť </h1>
	<table class="public-events">
	
	<?php 
		$events = Helper::get_public_events();
		
		foreach ($events as $event): 
			if(date_create($event->EventStartDate) >= new DateTime("now") ) :	
	?>
		<tr>

			<td>
	 			<strong><?= date_create($event->EventStartDate)->format('d. m. Y'); ?></strong>
 			</td>
 			<td>
 				<a href="<?= $event->guid ?>"><?= $event->post_title; ?></a>
 			</td>
	 	</tr>

	 		<?php
			endif;
		endforeach; 
			?>
			
	</table>
</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>