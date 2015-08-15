<?php

/**
 *******************************************************************************
 * Theme
 *******************************************************************************
 *
 * This file is used to create a baseline for the front-end of the site.
 *
 * - Remove unnecessary meta/link tags
 * - Queue jQuery correctly
 * - Remove thumbnail dimensions
 * - Gravity forms
 * - Image sizes (additions + updates)
 * - Register Nav Menus
 * - Create Nav Walker
 *
 */



/**
 * Remove unnecessary meta/link tags
 ******************************************************************************/

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );



/**
 * Queue jQuery correctly
 ******************************************************************************/

function wpst_requeue_jquery() {
    wp_deregister_script( 'jquery' );

    wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/assets/js/min/head.min.js', '', '', false );
    wp_enqueue_script( 'jquery' );

    wp_register_script( 'js-main', get_stylesheet_directory_uri() . '/assets/js/min/main.min.js', '', '', true );
    wp_enqueue_script( 'js-main' );
}

if ( !is_admin() ) add_action("wp_enqueue_scripts", "wpst_requeue_jquery", 11);
