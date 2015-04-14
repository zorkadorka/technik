<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header(); 

?>

<section id="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
</section>

</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<h1 class="dev-page-type">tribe-events default-template.php</h1>

<script type="text/javascript">
( function( $ ) {

	$( document ).ready( function() {
	
		$("td.tribe-events-has-events").each( function(){
			var n = $(this).children("div.tribe_events").length;
			($(this).children("div.tribe_events")).each( function(){
				$(this).css("height",100/n);
				/*$(this).children("h3").css("height",100/n);*/
			})
		});
	});

} )( jQuery );
</script>

<?php get_footer(); ?>