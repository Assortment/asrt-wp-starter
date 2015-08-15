<?php

/**
 *******************************************************************************
 * Admin area
 *******************************************************************************
 *
 * This file is used to create a baseline for the admin area.
 *
 * - Remove toolbar on front-end (appears when logged in)
 * - Remove pages (links, comments, etc)
 * - Update meta-boxes throughout the admin area
 * - Remove emoji support
 * - Add/remove post type features
 * - Add ACF options page
 * - Update permalinks
 * - Allow SVG uploads
 * - Stop core updates from admin area
 *
 */



/**
 * Remove toolbar on front-end (appears when logged in)
 ******************************************************************************/

add_filter( 'show_admin_bar', '__return_false' );



/**
 * Remove pages (links, comments, etc)
 ******************************************************************************/

function wpst_remove_menu_pages() {
     remove_menu_page( 'link-manager.php' );
     remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'wpst_remove_menu_pages' );



/**
 * Update meta-boxes throughout the admin area
 ******************************************************************************/

/**
 * Remove columns from Posts and Pages listing
 */
function wpst_post_type_columns( $col ) {
    if( isset($_GET['post_type']) && $_GET['post_type'] == 'page' ):
        $col['id'] = 'Page ID';
    else:
        $col['id'] = 'Post ID';
    endif;

    unset( $col['comments'] );
    unset( $col['author'] );
    unset( $col['tags'] );

    if( isset($_GET['post_type']) && $_GET['post_type'] == 'page' ):
        unset( $col['date'] );
    endif;

    return $col;
}

add_filter( 'manage_posts_columns', 'wpst_post_type_columns' );
add_filter( 'manage_pages_columns', 'wpst_post_type_columns' );

/**
 * Add ID column to Posts and Pages listing
 */
function wpst_fill_id_column( $col, $id ) {
    global $post;

    switch ( $col ) {
        case 'id':
            echo $id;
            break;
        default:
            break;
    }
}

add_action( 'manage_posts_custom_column', 'wpst_fill_id_column', 10, 2 );
add_action( 'manage_pages_custom_column', 'wpst_fill_id_column', 10, 2 );



/**
 * Remove emoji support
 ******************************************************************************/

function wpst_remove_tinymce_emoji( $plugins ) {
    if ( !is_array( $plugins ) ) {
        return array();
    }

    return array_diff( $plugins, array( 'wpemoji' ) );
}

function wpst_remove_emoji() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', 'wpst_remove_tinymce_emoji' );
}

add_action( 'init', 'wpst_remove_emoji' );



/**
 * Add/remove post type features
 ******************************************************************************/

function wpst_update_post_type_features() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'post', 'thumbnail' );
    remove_post_type_support( 'post', 'trackbacks' );
    remove_post_type_support( 'post', 'custom-fields' );

    remove_post_type_support( 'page', 'comments' );
    remove_post_type_support( 'page', 'thumbnail' );
    remove_post_type_support( 'page', 'trackbacks' );
    remove_post_type_support( 'page', 'custom-fields' );

    add_post_type_support( 'page', 'excerpt' );
}

add_action( 'init', 'wpst_update_post_type_features' );



/**
 * Add ACF options page
 ******************************************************************************/

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}



/**
 * Update permalinks
 ******************************************************************************/

function wpst_set_permalinks() {
    global $wp_rewrite;

    $wp_rewrite->set_permalink_structure( '/blog/%postname%/' );
    $wp_rewrite->set_category_base( 'blog/categories' );
    $wp_rewrite->set_tag_base( 'blog/tags' );
}

add_action( 'after_switch_theme' , 'wpst_set_permalinks', 10, 2 );



/**
 * Allow SVG uploads
 ******************************************************************************/

function wpst_update_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter( 'upload_mimes', 'wpst_update_mime_types' );



/**
 * Stop core updates from admin area
 ******************************************************************************/

$wpst_suppress_core_updates = function ($a) {
    global $wp_version;

    return (object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version,
    );
};

add_filter('pre_site_transient_update_core', $wpst_suppress_core_updates);
