<?php

$featuredPost = get_query_var('featuredPost');

if ($featuredPost) :

$featured_image = get_template_directory_uri() . '/inc/img/fallback.jpg';
    if ($featuredPost->featured_image) {
        $featured_image = $featuredPost->featured_image;
    }
?>

<div class="row featured-card">
        <div class="col-lg-3">
            <div class="card-image" style="background:url('<?php echo $featured_image; ?>')">
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="card-content">
            <a href="<?php echo $featuredPost->url; ?>" rel="noopener noreferrer" class="featured-card-title">
                <h3>
                    <?php 
                        if ($featuredPost->post_title) {
                            echo $featuredPost->post_title; 
                        } 
                    ?>
                </h3>
            </a>
                    <?php echo $featuredPost->post_excerpt; ?>
                    <br/>
                    <a href="<?php echo $featuredPost->url ?>" rel="noopener noreferrer">Read More</a><br>
                    <span class="card-meta"><?php echo $featuredPost->post_date; ?><br><?php echo $featuredPost->author; ?></span>
            </div>
        </div>
</div>
<?php endif; ?>
