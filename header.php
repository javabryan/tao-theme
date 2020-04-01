<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tao
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="front-col-image" style='background:url("<?php echo esc_url( get_theme_mod( 'customizer_setting_one' ) ); ?>")'></div>

<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tao' ); ?></a>

	<header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-md">
					<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() ) :
						?>
						<h1 class="site-title"><a class="sr-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a class="sr-only" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					if ( $tao_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $tao_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#primary-navbar-container" aria-controls="primary-navbar-container"
						aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 2,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse tao-global-menu',
					'container_id'    => 'primary-navbar-container',
					'menu_class'      => 'navbar-nav w-100',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker()
				) );
				?>
			</nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
