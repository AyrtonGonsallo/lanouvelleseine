<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = Tribe__Events__Main::postIdHelper( get_the_ID() );

/**
 * Allows filtering of the event ID.
 *
 * @since 6.0.1
 *
 * @param int $event_id
 */
$event_id = apply_filters( 'tec_events_single_event_id', $event_id );

/**
 * Allows filtering of the single event template title classes.
 *
 * @since 5.8.0
 *
 * @param array  $title_classes List of classes to create the class string from.
 * @param string $event_id The ID of the displayed event.
 */
$title_classes = apply_filters( 'tribe_events_single_event_title_classes', [ 'tribe-events-single-event-title' ], $event_id );
$title_classes = implode( ' ', tribe_get_classes( $title_classes ) );

/**
 * Allows filtering of the single event template title before HTML.
 *
 * @since 5.8.0
 *
 * @param string $before HTML string to display before the title text.
 * @param string $event_id The ID of the displayed event.
 */
$before = apply_filters( 'tribe_events_single_event_title_html_before', '<h1 class="' . $title_classes . '">', $event_id );

/**
 * Allows filtering of the single event template title after HTML.
 *
 * @since 5.8.0
 *
 * @param string $after HTML string to display after the title text.
 * @param string $event_id The ID of the displayed event.
 */
$after = apply_filters( 'tribe_events_single_event_title_html_after', '</h1>', $event_id );

/**
 * Allows filtering of the single event template title HTML.
 *
 * @since 5.8.0
 *
 * @param string $after HTML string to display. Return an empty string to not display the title.
 * @param string $event_id The ID of the displayed event.
 */
$title = apply_filters( 'tribe_events_single_event_title_html', the_title( $before, $after, false ), $event_id );
$cost  = tribe_get_formatted_cost( $event_id );

?>

<div id="tribe-events-content" class="tribe-events-single">
	<div style=" width:870px; margin-right: 20px;">
		<p class="tribe-events-back">
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</p>

		<!-- Notices -->
		<?php tribe_the_notices() ?>

		<?php echo $title; ?>

		<div class="tribe-events-schedule tribe-clearfix">
			<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
			<?php if ( ! empty( $cost ) ) : ?>
				<span class="tribe-events-cost"><?php echo esc_html( $cost ) ?></span>
			<?php endif; ?>
		</div>

		<!-- Event header -->
		<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
			<!-- Navigation -->
			<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>">
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</nav>
		</div>
		<!-- #tribe-events-header -->

		<?php while ( have_posts() ) :  the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Event featured image, but exclude link -->
				<div class="single-content-card single-content-event" >
					<div class="event-featured-img single-content-image">
						<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
					</div>
					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class="tribe-events-single-event-description single-content-description tribe-events-content entry-content description">
						<?php the_content(); ?>
						<?php $additional_fields = tribe_get_custom_fields();
							$lien = $additional_fields['Lien de réservation:'];
							if (isset($lien)) {
								if (strpos($lien,'http://') !== false || strpos($lien,'https://') !== false) {
									//echo "<a target=\"_blank\" href=\"";
									$url_res= $lien;
								}
								else {
									//echo "<a target=\"_blank\" href=\"";
									$url_res= "http://".$lien;
								}
							}
							else {
								//echo "<a href=\"";
								$url_res= esc_url( tribe_get_event_link() );
							}
						?>
						<a target="_blank" href="<?php echo $url_res?>" class="button-single-event icon-ticket hover_right">Acheter les tickets</a>
							
					</div>
					<!-- .tribe-events-single-event-description -->
					<?php //do_action( 'tribe_events_single_event_after_the_content' ) ?>
					
				</div>
				<!-- Video representative -->
			<?php
			$videoURL = $additional_fields['lien de la Vidéo'];
			if (isset($videoURL)) {
				$parts=explode("/",$videoURL);
				$len= sizeof($parts) ;
				$id= $parts[$len-1] ;
				
			echo "<div class=\"tribe-events-single-section tribe-events-event-meta primary tribe-clearfix\">";
			echo "<p style=\"text-align: center; font-weight:bold; font-size: 28px;margin-bottom: 0px;color: #c59d5f; margin-top: 10px;\">" . $additional_fields['Titre de la Video'] . "</p>";
			echo "<p style=\"text-align: center; font-weight:bold; margin-bottom: 0px;\">" . $additional_fields['Description de la video'] . "</p>";
			echo "<iframe style=\"width: 100% !important; height: 507px !important;padding: 20px;\" src=\"https://www.youtube.com/embed/" . $id . "\" frameborder=\"0\" allowfullscreen></iframe>";
			echo "</div>";
			echo "";
			}
			else {
			
			}
			?>
			<!-- End Video representative -->
				<!-- Event meta -->
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div> <!-- #post-x -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
		<?php endwhile; ?>

		<!-- Event footer -->
		<div id="tribe-events-footer">
			<!-- Navigation -->
			<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>">
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul>
				<!-- .tribe-events-sub-nav -->
			</nav>
		</div>
		<!-- #tribe-events-footer -->
	</div>
</div><!-- #tribe-events-content -->
