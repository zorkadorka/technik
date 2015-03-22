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
if ( is_user_logged_in() ) :
?>
	<section id="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</section> <!-- #tribe-events-pg-template -->

<?php else: 

$post_id = get_the_ID();

$title = get_the_title($post_id);
$public_description = get_post_meta($post_id, '_EventPublicInfo', true);

?>

	<h1><?= $title ?></h1>

	<div class="public-info">
		<?= htmlspecialchars_decode($public_description) ?>
	</div>
	
<?php endif ?>
</section> <!-- .main-content -->

<aside class="content aside-content">
	<?php get_sidebar(); ?>
</aside>

</div> <!-- .wrap -->

<h1 class="dev-page-type">tribe-events default-template.php</h1>

<?php get_footer(); ?>