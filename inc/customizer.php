<?php
/**
 * tao Theme Customizer
 *
 * @package tao
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tao_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tao_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tao_customize_partial_blogdescription',
		) );

		$wp_customize->add_section('tao', array(
			'title'             => __('Slider Images', 'name-theme'), 
			'priority'          => 70,
		));

		$wp_customize->add_setting('hero', array(
			'transport'         => 'refresh',
		));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_control', array(
			'label'             => __('Hero Image', 'tao'),
			'section'           => 'tao',
			'settings'          => 'hero',    
		)));
	}
}
add_action( 'customize_register', 'tao_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tao_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tao_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tao_customize_preview_js() {
	wp_enqueue_script( 'tao-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tao_customize_preview_js' );
