<?php

/**
 *******************************************************************************
 * Admin area
 *******************************************************************************
 *
 * This file is used to create a baseline for the admin area.
 *
 * $. Remove toolbar on front-end (appears when logged in)
 * $. Remove pages (links, comments, etc)
 * $. Remove default widgets
 * $. Update meta-boxes throughout the admin area
 * $. Remove emoji support
 * $. Add/remove post type features
 * $. Update permalinks
 * $. Allow SVG uploads
 * $. Stop core updates from admin area
 *
 */



/**
 * $. Remove toolbar on front-end (appears when logged in)
 ******************************************************************************/

add_filter( 'show_admin_bar', '__return_false' );



/**
 * $. Remove pages (links, comments, etc)
 ******************************************************************************/

function wpst_remove_menu_pages () {
     remove_menu_page( 'link-manager.php' );
     remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'wpst_remove_menu_pages' );



/**
 * $. Remove default widgets
 ******************************************************************************/

function wpst_unregister_widgets () {
    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Links' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_Search' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    unregister_widget( 'WP_Nav_Menu_Widget' );
    unregister_widget( 'bcn_widget' );
    unregister_widget( 'GFWidget' );
    unregister_widget( 'HSS_WpWidgets' );
    unregister_widget( 'P2P_Widget' );
    unregister_widget( 'WP_Widget_Recent_Posts_No_Title_Attributes' );
}

add_action( 'widgets_init', 'wpst_unregister_widgets' );



/**
 * $. Update meta-boxes throughout the admin area
 ******************************************************************************/

/**
 * Remove columns from Posts and Pages listing
 */
function wpst_post_type_columns ( $col ) {
    if( isset($_GET['post_type']) && $_GET['post_type'] == 'page' ):
        $col['id'] = 'Page ID';
    else:
        $col['id'] = 'Post ID';
    endif;

    unset( $col['comments'], $col['author'], $col['tags'] );

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
function wpst_fill_id_column ( $col, $id ) {
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
 * $. Remove emoji support
 ******************************************************************************/

/**
 * Remove Emoji support from WYSIWIG instances
 */
function wpst_remove_tinymce_emoji ( $plugins ) {
    if ( !is_array( $plugins ) ) {
        return array();
    }

    return array_diff( $plugins, array( 'wpemoji' ) );
}

/**
 * Remove Emoji support throughout the site
 */
function wpst_remove_emoji () {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    add_filter( 'tiny_mce_plugins', 'wpst_remove_tinymce_emoji' );
}

add_action( 'init', 'wpst_remove_emoji' );



/**
 * $. Add/remove post type features
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
 * $. Update permalinks
 ******************************************************************************/

function wpst_set_permalinks () {
    global $wp_rewrite;

    $wp_rewrite->set_permalink_structure( '/blog/%postname%/' );
    $wp_rewrite->set_category_base( 'blog/categories' );
    $wp_rewrite->set_tag_base( 'blog/tags' );
}

add_action( 'after_switch_theme' , 'wpst_set_permalinks', 10, 2 );



/**
 * $. Allow SVG uploads
 ******************************************************************************/

function wpst_update_mime_types ( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter( 'upload_mimes', 'wpst_update_mime_types' );



/**
 * $. Stop core updates from admin area
 ******************************************************************************/

function wpst_stop_core_updates ( $a ) {
    global $wp_version;

    return (object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version,
    );
}

add_filter( 'pre_site_transient_update_core', 'wpst_stop_core_updates' );
