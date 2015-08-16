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
 * - Update image sizes
 * - Gravity forms
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



/**
 * Update image sizes
 ******************************************************************************/

get_option("medium_crop") === false ? add_option("medium_crop", "1") : update_option("medium_crop", "1");
get_option("large_crop") === false ? add_option("large_crop", "1") : update_option("large_crop", "1");



/**
 * Gravity forms
 ******************************************************************************/

/**
 * Better validation message
 */
function wpst_update_validation_message( $message, $form ){
    $output  = '<div class="alert alert--error">';
    $output .= '<strong>Error:</strong> Please complete the required fields and try again';
    $output .= '</div>';

    return $output;
}

add_filter( 'gform_validation_message', 'wpst_update_validation_message', 10, 2 );

/**
 * Update the Form submit button
 */
function wpst_gforms_submit_button( $button, $form ){
    $output  = '<button type="submit" class="btn btn--primary" id="gform_submit_button_' . $form["id"] . '">';
    $output .= $btn_array["text"];
    $output .= '</button>';

    return $output;
}

add_filter( 'gform_submit_button', 'wpst_gforms_submit_button', 10, 2 );
