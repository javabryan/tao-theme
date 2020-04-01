<?php

$featuredPost = get_query_var('featuredPost');

?>

<div class="card-feature flex-fill">
    <div>
        <h2 class="card-title">
            <!-- <a href="<?php echo esc_url( $featuredPost->url ); ?>"> -->
			    <?php echo $featuredPost->post_title; ?>
            <!-- </a> -->
        </h2>
        <div class="card-content">
            <?php echo $featuredPost->post_content ?>
        </div>
    </div>

</div>
