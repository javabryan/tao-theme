<?php 
// Ensure the global $post variable is in scope
global $post;
$events = tribe_get_events( [ 
    'posts_per_page' => 8,
    'featured' => true,
     ] );
?>
<div class="container upcoming-events-section">
<div class="row">
        <div class="col-12">
            <h2>Upcoming Events</h2>
        </div>
    </div>
    <div class="row upcoming-events">
<?php

$now = new DateTime();

foreach ( $events as $post ) : 
    $date = $post->event_date;
    $check_date = new DateTime($date);

    if ($check_date > $now) :
    $hour = date('h:ia', strtotime($date));

    $firstChar = substr($hour, 0, 1);
    if(!is_int($firstChar) && $firstChar == 0) {
        $hour = substr($hour, 1);
    }
    setup_postdata( $post );

    $thumbnail_url = get_template_directory_uri() . '/inc/img/fallback.jpg';
    if ( has_post_thumbnail() ) {
        $thumbnail_url = get_the_post_thumbnail_url(); 
    }
?>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6 d-flex event-card align-items-stretch">
                <div class="event-card-inner d-flex align-items-stretch">
                    <a class="img-container" href="<?php echo esc_url($post->guid); ?>">
                        <div aria-hidden="true" class="card-img" style='background:url("<?php echo esc_url($thumbnail_url); ?>")'></div>
                        <h3><span><?php echo $post->post_title ?><span></h3>
                    </a>
                    <h4><?php echo date('l m/d', strtotime($date));?> <br><small><?php echo $hour ?></small></h4>
                    <p>
                        <?php echo wp_trim_words($post->post_excerpt, 22); ?>
                    </p>
                    <a class="sign-up" href="<?php echo $post->guid; ?>">Sign Up</a>
                </div>
            </div>
        <?php else : ?>
            <p>There are currently no featured events</p>
        <?php
            endif;
            endforeach; 
    ?>
    </div>