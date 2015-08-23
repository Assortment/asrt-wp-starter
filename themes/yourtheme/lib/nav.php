<?php

/**
 *******************************************************************************
 * Navigation
 *******************************************************************************
 *
 * This file is used to setup and configure the WordPress Menus. You can
 * choose what pages/posts go into these via WordPress' admin area.
 *
 * - Register Nav Menus
 * - Create Nav Walker
 *
 */



/**
 * Register Nav Menus
 ******************************************************************************/

function wpst_register_nav_menus() {
    $args = array(
        'primary' => __( 'Primary' ),
        'secondary' => __( 'Secondary' ),
        'tertiary' => __( 'Tertiary' )
    );

    register_nav_menus( $args );
}

add_action( 'init', 'wpst_register_nav_menus' );
