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
if(!is_int($firstChar)) {
    $hour = substr($hour, 1);
}
?>

<main>
    <section class="tao-event-hero parallax pt-4" style='background:url("<?php echo $featured ?>")'>  
        <div class="tao-event-title">
            <h1><?php echo single_post_title(); ?></h1>
            <div class="single-event-time"><?php echo date('l m/d', strtotime($date));?> - <?php echo $hour ?></div>
        </div>
    </section>
    <section class="container">
        <div class="row pb-4">
            <div class="col-12 event-col">
                <?php
                    echo $event->post_content;
                    the_content();
                ?>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-12">
                <?php echo $event_form ?>
            </div>
        </div>
    </section>
<section>
</section>
</main>