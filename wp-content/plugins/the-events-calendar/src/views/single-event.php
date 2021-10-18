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
$event_id = get_the_ID();

global $wpdb;
?>

<style>
	.section-padding {
		padding: 70px 0;
	}
</style>

<!-- .tp-breadcumb-area start -->
<div class="tp-breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="tp-breadcumb-wrap">
					<?php the_title( '<h2>', '</h2>' );?>
					<ul>
						<li><a href="/">Home</a></li>
						<!-- <li><span>Event</span></li> -->
						<li><a href="javascript::void()"><?php the_title( '<span>', '</span>' );?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .tp-breadcumb-area end -->

<!-- tp-event-details-area start -->
<div class="tp-case-details-area section-padding" style="background: #eee;">
	<div class="container">
		<div class="row">
			<div class="col col-md-8">
				<div class="tp-case-details-wrap">
					<div class="tp-case-details-text">
						<div id="Description">
							<div class="tp-case-details-img">
							<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
							</div>
							<div class="tp-case-content">
								<div class="tp-case-text-top">
									<?php the_title( '<h2>', '</h2>' );?>
									<div class="case-b-text">
									<?php the_content(); ?>
									</div>
									<!-- <div class="case-bb-text">
										<h3>Event Mission</h3>
										<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure.</p>
										<ul>
											<li>Save The Children’s Role In Fight Against Malnutrition Hailed</li>
											<li>Charity Can Help Make Smile Of Poor People</li>
											<li>Else he endures pains to avoid worse pains.</li>
											<li>We denounce with righteous indignation and dislike men. </li>
											<li>Financial Help For Poor Families</li>
										</ul>
									</div> -->
									<!-- <div class="case-bb-text">
										<h3>Event Loacation</h3>
										<div id="Map" class="tab-pane">
											<div class="contact-map">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
											</div>
										</div>
									</div> -->
									
									<?php tribe_get_template_part( 'modules/meta' ); ?>

									<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

									<!-- <div class="submit-area sub-btn">
										<a href="donate.html" class="theme-btn submit-btn">Donate Now</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-md-4">
				<div class="tp-blog-sidebar">
					<!-- <div class="widget search-widget">
						<h3>Search Here</h3>
						<form>
							<div>
								<input type="text" class="form-control" placeholder="Search Post..">
								<button type="submit"><i class="ti-search"></i></button>
							</div>
						</form>
					</div> -->
					<div class="widget recent-post-widget">
						<h3>Recent posts</h3>
						<div class="posts">
						<?php
						$resultsdonaccxe = tribe_get_events( array(
							'posts_per_page' => 3,
							'order' => 'DESC'
						));

						//$resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish' ORDER BY ID DESC LIMIT 3", ARRAY_A);

                        foreach ($resultsdonaccxe as $eve) {
							$featured_img_url = get_the_post_thumbnail_url($eve->ID, 'full');
                        	$dates = date('dS M Y', strtotime($eve->event_date));  //get_the_date('dS M Y', $eve->event_date)
                            ?>
							<div class="post">
								<div class="img-holder">
									<img src="<?= $featured_img_url; ?>" alt>
								</div>
								<div class="details">
									<h4><a href="<?= BASE_URL . 'event/'.$eve->post_name; ?>"><?= $eve->post_title; ?></a></h4>
									<span class="date"><?= $dates; ?></span>
								</div>
							</div>
							<?php
                        } ?>
							
						</div>
					</div>
					<!-- <div class="widget tag-widget">
						<h3>Tags</h3>
						<ul>
							<li><a href="#">Donations</a></li>
							<li><a href="#">Charity</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">Non Profit</a></li>
							<li><a href="#">Poor People</a></li>
							<li><a href="#">Helping Hand</a></li>
							<li><a href="#">Video</a></li>
						</ul>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- tp-event-details-area end -->