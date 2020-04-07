<?php
/**
 * Template part for displaying event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tao
 */
global $event_form;
$event = get_queried_object();
$featured = tao_get_featured_image();
$date = $event->EventStartDate;

$hour = date('h:ia', strtotime($date));

$firstChar = substr($hour, 0, 1);
if(!is_int($firstChar) && $firstChar == 0) {
    $hour = substr($hour, 1);
}
?>

<main>
    <section class="tao-event-hero parallax pt-4" style='background:url("<?php echo esc_url($featured) ?>")'>  
        <div class="tao-event-title">
            <h1><?php echo esc_html(single_post_title()); ?></h1>
            <div class="single-event-time"><?php echo esc_html(date('l m/d', strtotime($date));?> - <?php echo esc_html($hour) ?>)</div>
        </div>
    </section>
    <section class="container">
        <div class="row pb-4">
            <div class="col-12 event-col">
                <?php
                    echo esc_html($event->post_content);
                    esc_html(the_content());
                ?>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12">
                <?php echo esc_html($event_form) ?>
            </div>
        </div>
    </section>
<section>
</section>
</main>