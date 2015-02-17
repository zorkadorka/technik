<?php
/*
Template Name: predstavenia
*/

get_header(); ?>

<section class="predstavenia">
	<?php 
		$events = get_public_events();
		
		foreach ($events as $event): 
			if(date_create($event->EventStartDate) >= new DateTime("now") ) :	
	?>
			<div class= "public-event">	
	 			<strong><?= date_create($event->EventStartDate)->format('d. m. Y'); ?></strong>
	 			<?= $event->post_title; ?>
	 			
	 		</div>
	 		<?php
			endif;
		endforeach; 
			?>
	
</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>