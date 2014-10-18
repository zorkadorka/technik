<?php
/**
 * Template Name: vystupenia template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php

			$args = array( 'post_type' => 'tribe_events' );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>


			    <?php do_action( 'tribe_events_before_template' ); ?>

					<!-- Tribe Bar -->
				<?php tribe_get_template_part( 'modules/bar' ); ?>

					<!-- Main Events Content -->
				<?php tribe_get_template_part( 'list/content' ); ?>

					<div class="tribe-clear"></div>

				<?php do_action( 'tribe_events_after_template' ) ?>

			<?php
			endwhile;
			?>


		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
