<?php

$featuredPost = get_query_var('featuredPost');

?>

<div class="card-feature flex-fill">
    <div>
        <h2 class="card-title">
			    <?php echo $featuredPost->post_title; ?>
        </h2>
        <div class="card-content">
            <?php echo $featuredPost->post_content ?>
        </div>
    </div>

</div>
