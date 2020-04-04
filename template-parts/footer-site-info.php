<div class="footer-site-info">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-9 tao-footer-about">
                <a href="<?php echo esc_url( home_url( '/' ) ) ?>">
                    <h4>
                        <a class="sr-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
                    </h4>
                    <p><?php echo esc_html(get_theme_mod('tao_footer_description')); ?></p>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <nav class="tao-footer-menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'depth'           => 2,
                        'container'       => 'div',
                        'container_class' => 'tao-global-menu',
                        'container_id'    => 'footer-navbar-container',
                        'menu_class'      => 'navbar-nav',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker()
                    ) );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>
