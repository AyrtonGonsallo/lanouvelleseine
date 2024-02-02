<?php
/**
 * View: List Single Event Description
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/description.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

if ( empty( (string) $event->excerpt ) ) {
	return;
}
?>
<div class="tribe-events-calendar-list__event-description tribe-common-b2 tribe-common-a11y-hidden">
	<?php echo (string) $event->excerpt; ?>
</div>
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
<div class="event_buttons" style="margin-top:20px">
	<div class="button_red"><a target="_blank" href="<?php echo $url_res?>" class="vh_button red icon-ticket hover_right">Acheter les tickets</a>
	</div>
	<div class="button_yellow">
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="vh_button yellow icon-play-1 hover_right">En savoir plus</a>
	</div>
</div>