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
global $event_form;
$event = get_queried_object();
$featured = tao_get_featured_image();
$date = $event->EventStartDate;

$hour = date('h:ia', strtotime($date));

$firstChar = substr($hour, 0, 1);
if(!is_int($firstChar)) {
    $hour = substr($hour, 1);
}

$featured = get_template_directory_uri() . '/inc/img/fallback.jpg';
    if ( has_post_thumbnail() ) {
        $featured = tao_get_featured_image(); 
    }
?>

<div id="tribe-events-content" class="tribe-events-single">
	<header class="tao-event-hero parallax pt-4" style='background:url("<?php echo esc_url($featured) ?>")'>  
		<div class="tao-event-title">
			<h1><?php echo the_title(); ?></h1>
			<div class="single-event-time"><?php echo date('l m/d', strtotime($date));?> - <?php echo $hour ?></div>
		</div>
	</header>

<div class="container tao-event-single-main">
	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>
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

				<!-- Event content -->
				<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
				<div class="tribe-events-single-event-description tribe-events-content">
					<?php the_content(); ?>
				</div>
				<!-- .tribe-events-single-event-description -->
				<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

				<!-- Event meta -->
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div> <!-- #post-x -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
			<div class="row pb-4">
            <div class="col-12">
                <?php echo $event_form ?>
            </div>
        </div>
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
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->