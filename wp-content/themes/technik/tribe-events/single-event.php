<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();
?>

<?php 
	$public_description = get_post_meta($event_id, '_EventPublicInfo', true);
	$excerpt_description = get_post($event_id)->post_excerpt;
?>

<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
	
	<div class="excerpt-info">
		<h3>V skratke</h3>
		<?= htmlspecialchars_decode($excerpt_description) ?>
	</div>

	<?php if(strlen($public_description) > 0): ?>
		<div class="public-info">
			<h3>Pre verejnosť</h3>
			<?= htmlspecialchars_decode($public_description) ?>
		</div>
	<?php endif?>



<?php
if (!is_user_logged_in()):
?>
	<a href="<?= tribe_get_listview_link() ?>">Zoznam všetkých vystúpení</a>
<?php
endif;
?>

<?php
if (is_user_logged_in()):
?>

<h1>Pre nás</h1>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>	

	<div class="tribe-events-schedule updated published tribe-clearfix">
		<b>Dátum:</b>
		<!--<?php echo tribe_events_event_schedule_details( $event_id, '<i>', '</i>' ); ?>-->
		<?php echo tribe_get_start_date( $event_id, false, 'd. M Y' ); ?> 
		-
		<?php echo tribe_get_end_date( $event_id, false, 'd. M Y' ); ?>
		<br />
		<b>Čas:</b>
		<?php echo tribe_get_start_date( $event_id, false, 'H:i' ); ?>
		-
		<?php echo tribe_get_end_date( $event_id, false, 'H:i' ); ?>


	</div>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'single_event_links' ) ?>
			
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

		<p class="tribe-events-back">
		<a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; Všetky vystúpenia', 'tribe-events-calendar' ) ?></a>
	</p>

	<ul class="tribe-events-sub-nav">
		<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> Predchádzajúca udalosť'  ) ?></li>
		<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( 'Nasledujúca udalosť <span>&raquo;</span>' ) ?></li>
	</ul>


</div><!-- #tribe-events-content -->

<?php
endif;
?>