<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tao
 */

?>

</div><!-- #content -->

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
				<?php get_template_part( 'template-parts/footer', 'site-info' ) ?>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>