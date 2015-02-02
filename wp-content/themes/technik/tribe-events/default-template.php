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

get_header(); ?>


	<section id="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</section> <!-- #tribe-events-pg-template -->


</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<<<<<<< HEAD
=======
<h1 class="dev-page-type">tribe-events defaiult-template.php</h1>
>>>>>>> 2adaa110b4dba5cf45760d41be0b6685b661e3c1
<?php get_footer(); ?>