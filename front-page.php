<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tao
 */

get_header();
?>
<main>
<section class="tao-front-section tao-hero parallax" style='background:url("<?php echo esc_url( get_theme_mod( 'hero' ) ); ?>")'>    
        <span class="tao-description">
            <?php echo get_bloginfo('description'); ?>
        </span>
</section>
<section>
    <?php 
        get_template_part( 'template-parts/front-page', 'events' );
    ?>
</section>
</main>
</div>

<?php get_footer(); ?>