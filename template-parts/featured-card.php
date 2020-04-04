<?php

$featuredPost = get_query_var('featuredPost');

?>

<div class="row">
    <div>
        <h2 class="card-title">
			    <?php echo $featuredPost->post_title; ?>
        </h2>
        <div class="card-content">
            <?php echo $featuredPost->post_excerpt; ?>
        </div>
    </div>

</div>
