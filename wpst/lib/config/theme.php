<?php

/**
 *******************************************************************************
 * Theme
 *******************************************************************************
 *
 * This file is used to create a baseline for the front-end of the site.
 *
 * $. Remove unnecessary meta/link tags
 * $. Queue jQuery correctly
 * $. Update default image sizes
 * $. Create custom image sizes
 * $. Update functions to HTML5
 * $. Register Nav Menus
 * $. Gravity forms
 *
 */



/**
 * $. Remove unnecessary meta/link tags
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
 * $. Queue jQuery correctly
 ******************************************************************************/

function wpst_requeue_jquery () {
    $js_head = get_stylesheet_directory_uri() . '/assets/js/min/head.min.js';
    $js_main = get_stylesheet_directory_uri() . '/assets/js/min/main.min.js';

    wp_deregister_script( 'jquery' );

    wp_register_script( 'jquery', $js_head, '', '', false );
    wp_enqueue_script( 'jquery' );

    wp_register_script( 'js-main', $js_main, '', '', true );
    wp_enqueue_script( 'js-main' );
}

if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'wpst_requeue_jquery', 11 );
}



/**
 * $. Update default image sizes
 ******************************************************************************/

if ( get_option("medium_crop") === false ) {
    add_option("medium_crop", "1");
} else {
    update_option("medium_crop", "1");
}

if ( get_option("large_crop") === false ) {
    add_option("large_crop", "1");
} else {
    update_option("large_crop", "1");
}



/**
 * $. Create custom image sizes
 ******************************************************************************/

/**
 * This is an example, use once needed. Further info see:
 * https://developer.wordpress.org/reference/functions/add_image_size/
 */

// add_image_size('banner', 1200, 400, true);



/**
 * $. Update functions to HTML5
 ******************************************************************************/

add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery']);



/**
 * $. Register Nav Menus
 ******************************************************************************/

function wpst_register_nav_menus () {
    $args = array(
        'primary'   => __( 'Primary' ),
        'secondary' => __( 'Secondary' ),
        'tertiary'  => __( 'Tertiary' )
    );

    register_nav_menus( $args );
}

add_action( 'init', 'wpst_register_nav_menus' );



/**
 * $. Gravity forms
 ******************************************************************************/

/**
 * Better validation message
 */
function wpst_update_validation_message( $msg, $form ){
    $output  = '<div class="alert alert--error">';
    $output .= '<strong>Error:</strong> Please complete the required fields and try again';
    $output .= '</div>';

    return $output;
}

add_filter( 'gform_validation_message', 'wpst_update_validation_message', 10, 2 );

/**
 * Update the Form submit button
 */
function wpst_gforms_submit_button( $btn, $form ){
    $output  = '<button type="submit" class="btn btn--primary" id="gform_submit_button_' . $form['id'] . '">';
    $output .= $form['button']['text'];
    $output .= '</button>';

    return $output;
}

add_filter( 'gform_submit_button', 'wpst_gforms_submit_button', 10, 2 );
