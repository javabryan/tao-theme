<?php 
// Ensure the global $post variable is in scope
global $post;
$events = tribe_get_events( [ 'posts_per_page' => 5 ] );
?>
<div class="container upcoming-events-section">
<div class="row">
        <div class="col-12">
            <h2>Upcoming Events</h2>
        </div>
    </div>
    <div class="row upcoming-events">
<?php
foreach ( $events as $post ) : 
    $date = $post->event_date;
    $hour = date('h:ia', strtotime($date));

    $firstChar = substr($hour, 0, 1);
    if(!is_int($firstChar)) {
        $hour = substr($hour, 1);
    }
    setup_postdata( $post );
?>
            <div class="col-12 col-lg-4 col-md-6 d-flex event-card align-items-stretch">
                <div class="event-card-inner d-flex align-items-stretch">
                    <a href="<?php echo $post->guid; ?>">
                        <div aria-hidden="true" class="card-img" style='background:url("<?php echo get_the_post_thumbnail_url() ?>")'>
                            <h3><?php echo $post->post_title ?></h3>
                        </div>
                    </a>
                    <h4><?php echo date('l m/d', strtotime($date));?> <small><?php echo $hour ?></small></h4>
                    <p><?php echo $post->post_excerpt ?></p>
                    <a class="sign-up" href="<?php echo $post->guid; ?>">Sign Up</a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>