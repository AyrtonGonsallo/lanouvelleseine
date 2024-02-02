<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

// Setup an array of venue details for use later in the template
$venue_details = array();

if ( $venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;
}

if ( $venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;
}
// Venue microformats
$has_venue_address = ( $venue_address ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<?php
$additional_fields = tribe_get_custom_fields();
?>
<div class="single-movie-container">
	<div class="movie_list_image shadows">
		<div class="bottom_line" style="text-align:center">
		<?php echo tribe_event_featured_image( null, 'medium' ) ?>
		</div>
	</div>
	<div class="movie_list_container">
	<div class="movie-card-right-side">
		<div class="movie_title">
		<div class="marginright30" style="padding-left:30px;">
			<a href="<?php echo esc_url( tribe_get_event_link() ); ?>">
				<?php the_title() ?>
			</a>
		</div>
		</div>
		<div class="overview-container">
			<div class="main_side_left">
			<div class="marginright30" style="padding-left:30px;">
				<div class="event_list_item icon-users">
					<div class="title left">Acteur(s):</div>
					<div class="info event_actors" style="color:#c59d5f; font-weight:bold;"><?php echo $additional_fields['Acteur(s):']; ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="event_list_item icon-calendar">
					<div class="title left">Date de Début / Fin:</div>
					<div class="info event_release" style="color:#c59d5f;"><?php echo tribe_events_event_schedule_details() ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="event_list_item icon-clock">
					<div class="title left">Durée:</div>
					<div class="info movies_length" style="color:#c59d5f;"><?php echo $additional_fields['Durée:']; ?></div>
					<div class="clearfix"></div>
				</div>
			</div>
			</div>
			<div class="main_side_right">
			<div class="marginright30" style="padding-left:30px;">
				<div class="event_list_item icon-users">
					<div class="title right">Catégorie:</div>
					<div class="info event_category"><?php
						echo tribe_get_event_categories(
							get_the_id(), array(
								'before'       => '',
								'sep'          => ', ',
								'after'        => '',
								'label'        => null, // An appropriate plural/singular label will be provided
								'label_before' => '<dt style="display:none;">',
								'label_after'  => '</dt>',
								'wrap_before'  => '<dd class="tribe-events-event-categories">',
								'wrap_after'   => '</dd>'
							)
						);
						?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="event_list_item icon-user">
					<div class="title right">Proposé par:</div>
					<div class="info event_director" style="color:#c59d5f;"><?php echo tribe_get_organizer() ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="event_list_item icon-tag">
					<div class="title right">Mots-clefs de l'événement:</div>
					<div class="info event_box_office"><?php echo tribe_meta_event_tags2( __( 'tribe-events-calendar' ), ', ', false ) ?></div>
					<div class="clearfix"></div>
				</div>
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<!--end of overview-container-->
		<div class="event_buttons">
			<div class="button_red">
<?php
$lien = $additional_fields['Lien de réservation:'];
if (isset($lien)) {
	if (strpos($lien,'http://') !== false || strpos($lien,'https://') !== false) {
		echo "<a target=\"_blank\" href=\"";
		echo $lien;
	}
	else {
		echo "<a target=\"_blank\" href=\"";
		echo "http://" . $lien;
	}
}
else {
	echo "<a href=\"";
	echo esc_url( tribe_get_event_link() );
}
?>
			 " class="vh_button red icon-ticket hover_right">Acheter les tickets</a></div>

			<div class="button_yellow"><a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="vh_button yellow icon-play-1 hover_right">En savoir plus</a></div>
		</div>
	</div>
	</div>
</div>