<?php
/**
 * Single Event Meta (Map) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/map.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */
$map = tribe_get_embedded_map();
if ( empty( $map ) ) {
	return;
}
?>
<!-- <div class="tribe-events-venue-map">
	<?php
	// Display the map.
	/* do_action( 'tribe_events_single_meta_map_section_start' );
	echo $map;
	do_action( 'tribe_events_single_meta_map_section_end' ); */
	?>
</div> -->

<div class="case-bb-text">
	<!-- <h3>Event Loacation</h3> -->
	<div id="Map" class="tab-pane">
		<div class="contact-map">
		<?php
			// Display the map.
			do_action( 'tribe_events_single_meta_map_section_start' );
			echo $map;
			do_action( 'tribe_events_single_meta_map_section_end' );
		?>
		</div>
	</div>
</div>