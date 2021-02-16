<?php
/**
 * Tilva Mika Custom Functions File
 *
 * @package Tilva_Mika
 */

/**
 * Custom functions for frotn page display
 */

function tilvamika_most_recent_posts( $query, $cat_name ) {
    $query = new WP_Query( array(
        'category_name' => $cat_name,
        'posts_per_page' => 3,
    ));
    return $query;
}
add_filter('most_recent', 'tilvamika_most_recent_posts', 10, 2);

/**
 * Default featured image for posts
 */
function tilvamika_display_default_featured_img($attachment_id = 755, $imageSizeName = 'thumbnail') {
    // $attachment_id = 755;
    // $imageSizeName = 'thumbnail';
    $img = wp_get_attachment_image_src($attachment_id, $imageSizeName);
    return $img;
}
add_filter('display_default_featured_img', 'tilvamika_display_default_featured_img', 10, 3);

// Use Ionicons in WordPress

function tilvamika_enqueue_ionicons() {
	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js', array(), 'tilvamika' );
}
add_action( 'wp_enqueue_scripts', 'tilvamika_enqueue_ionicons' );