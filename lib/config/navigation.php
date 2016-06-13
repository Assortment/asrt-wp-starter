<?php

/**
 *******************************************************************************
 * Navigation
 *******************************************************************************
 *
 * This file is used to create a baseline for the navigational menus that you
 * can use within WordPress.
 *
 * $. Registration
 * $. Set defaults
 *
 */



/**
 * $. Registration
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
 * $. Set defaults
 ******************************************************************************/

/**
 * Remove wp_nav_menu() containers
 */
function wpst_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}

add_filter( 'wp_nav_menu_args', 'wpst_nav_menu_args' );

/**
 * Remove wp_nav_menu() IDs
 */
function wpst_nav_strip_id() {
    return '';
}

add_filter( 'nav_menu_item_id', 'wpst_nav_strip_id' );

/**
 * Remove all wp_nav_menu() classes (and add .is-current)
 */
function wpst_nav_strip_classes( $a ){
    return ( in_array( 'current_page_item', $a ) ) ? array( 'nav__item', 'is-current' ) : array('nav__item');
}

add_filter( 'nav_menu_css_class', 'wpst_nav_strip_classes', 10, 2 );

/**
 * Setup item classes
 */
function wpst_nav_special_classes( $classes, $item ){
    if(isset($post)):
        if( $item->object_id == get_root_parent_id() ):
            $classes[] = 'is-root-parent';
        endif;
    endif;

    return $classes;
}

add_filter( 'nav_menu_css_class' , 'wpst_nav_special_classes', 10, 2 );

/**
 * Setup link attributes
 */
function wpst_nav_link_attributes( $atts, $item, $args ) {
    // Manipulate attributes
    if( isset($atts['class']) ):
        $atts['class'] .= 'nav__link';
    else:
        $atts['class'] = 'nav__link';
    endif;

    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'wpst_nav_link_attributes', 10, 3 );
