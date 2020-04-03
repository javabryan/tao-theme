<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package tao
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tao_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'tao_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tao_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tao_pingback_header' );

/*
 * get featured post
 */

function tao_get_featured_post( $setting ) {
	$post_id = get_theme_mod( $setting, 0 );
	if ( $post_id > 0 ) {
		$post = get_post( $post_id );
	}
	return $post;
}

function tao_get_featured_posts( $numPosts = 5 ) {
	$featured_posts = array();
	$stickies       = get_option( 'sticky_posts' );
	if ( is_array( $stickies ) && sizeof( $stickies ) > 0 ) {
		$query = new WP_Query( array(
			'post_type'           => 'post',
			'post__in'            => $stickies,
			'posts_per_page'      => $numPosts,
			'ignore_sticky_posts' => true,
			'order'               => 'desc',
			'orderby'             => 'date'
		) );
		while ( $query->have_posts() ) {
			$query->the_post();
			$post                = new stdClass();
			$post->post_title    = get_the_title();
			$post->author        = get_the_author();
			$post->url           = get_permalink();
			$post->post_date     = get_the_date();
			$post->post_content  = get_the_content();
			$post->category      = 'Uncategorized';
			$post->categoryColor = 'category-red';

			tao_update_single_category( $post );

			$featured_posts[] = $post;
		}
	}
	wp_reset_postdata();

	return $featured_posts;
}

function tao_update_single_category( &$post, $post_id = null ) {
	$cats = get_the_category( $post_id );
	if ( is_array( $cats ) ) {
		foreach ( $cats as $cat ) {
			if ( is_a( $cat, 'WP_Term' ) && $cat->term_id > 0 ) {
				$post->category      = $cat->name;
				$post->categoryColor = tao_get_category_color( $cat->term_id );

				return;
			}
		}
	}
}

function tao_get_single_category_id( $post_id = null ) {
	$result = 0;
	$cats   = get_the_category( $post_id );
	if ( is_array( $cats ) ) {
		foreach ( $cats as $cat ) {
			if ( is_a( $cat, 'WP_Term' ) && $cat->term_id > 0 ) {
				$result = $cat->term_id;
				break;
			}
		}
	}

	return $result;
}

function tao_get_category_color( $term_id ) {
	$result = 'category-red';
	$color  = get_field( 'color', 'category_' . $term_id );
	if ( $color ) {
		$result = 'category-' . $color;
	}

	return $result;
}

function tao_get_featured_image() {
    //Execute if singular
    if ( is_singular( 'tribe_events' ) ) {

        $id = get_queried_object_id ();

        // Check if the post/page has featured image
        if ( has_post_thumbnail( $id ) ) {

            // Change thumbnail size, but I guess full is what you'll need
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );

            $url = $image[0];

        } else {

            //Set a default image if Featured Image isn't set
            $url = '';

        }
    }

    return $url;
}

/**
 * Return formatted event date
 */
function tao_formatted_date($event_date) {
    $hour = date('h:ia', strtotime($event_date));

    $firstChar = substr($hour, 0, 1);
    if(!is_int($firstChar)) {
        $hour = substr($hour, 1);
	}
	
	$pre_date = date('l m/d', strtotime($event_date));
    $hour = date('h:ia', strtotime($event_date));
	$full_date = '<div class="full-date">' . '<p>' . $pre_date . '<p>' . '<small>' . $hour . '</small>';

	return $full_date;
}