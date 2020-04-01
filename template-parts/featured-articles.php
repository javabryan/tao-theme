<?php
 $featuredPosts = tao_get_featured_posts(5);
?>
<div class="container">

    <?php if (is_array($featuredPosts) && sizeof($featuredPosts) > 0) : ?>

    <div class="row">
        <div class="col-12 d-flex">
            <?php
            if (array_key_exists(0, $featuredPosts)) {
	            set_query_var( 'featuredPost', $featuredPosts[0] );
                get_template_part( 'template-parts/featured', 'card' );
            }
            ?>
        </div>
        <div class="col-12 d-flex">
            <?php
            if (array_key_exists(0, $featuredPosts)) {
	            set_query_var( 'featuredPost', $featuredPosts[1] );
	            get_template_part( 'template-parts/featured', 'card' );
            }
            ?>
        </div>
        <div class="col-12 d-flex">
            <?php
            if (array_key_exists(0, $featuredPosts)) {
	            set_query_var( 'featuredPost', $featuredPosts[2] );
	            get_template_part( 'template-parts/featured', 'card' );
            }
            ?>
        </div>
        <div class="col-12 d-flex">
            <?php
            if (array_key_exists(0, $featuredPosts)) {
	            set_query_var( 'featuredPost', $featuredPosts[3] );
	            get_template_part( 'template-parts/featured', 'card' );
            }
            ?>
        </div>
        <div class="col-12 d-flex">
            <?php
            if (array_key_exists(0, $featuredPosts)) {
	            set_query_var( 'featuredPost', $featuredPosts[4] );
	            get_template_part( 'template-parts/featured', 'card' );
            }
            ?>
        </div>
    </div>

    <?php else : ?>
        <div class="row">
            <div class="col-12">
                <div class="text-muted h1 pt-5 pb-2 text-center">
                    No featured posts found :(
                </div>
                <div class="text-center pb-5 pt-2">
                    <?php if (current_user_can('publish_posts')) : ?>
                        <a href="<?php echo esc_url(admin_url('post-new.php')) ?>">Go create a post!</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>