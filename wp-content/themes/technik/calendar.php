<?php
/*
Template Name: Kalendár
*/

get_header(); 
?>

	<section id="tribe-events-pg-template">
		<?= "tribe_events_before_html" ?>
		<?php tribe_events_before_html(); ?>
		<?= "get view" ?>
		<?php tribe_get_view(); ?>
		<?= "tribe_events_after_html" ?>
		<?php tribe_events_after_html(); ?>
	</section> <!-- #tribe-events-pg-template -->


</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<?php get_footer(); ?>