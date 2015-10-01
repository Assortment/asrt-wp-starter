<?php

/**
 *******************************************************************************
 * Post type queries: Page
 *******************************************************************************
 *
 * A set of functions to access the Page post type results.
 *
 * $. Getters
 * $. Setters
 *
 */



/**
 * $. Getters
 ******************************************************************************/

/**
 * Get pages.
 *
 * @param  int     $parent  Define the parent page of the pages you're getting.
 * @return object           WP_Query instance
 */
function wpst_get_pages ( $parent = null ) {

    // Define arguments for query.
    $args = array(
        'post_type'    => 'page',
        'post_parent'  => 0,
        'sort_order'   => 'ASC',
        'sort_column'  => 'menu_order'
    );

    // If param is declared, override the 'post_parent' argument
    if( !is_null($parent) ):
        $args['post_parent'] = $parent;
    endif;

    // New instance of WP_Query class.
    $output = new WP_Query( $args );

    // Return the results
    return $output;
}



/**
 * $. Setters
 ******************************************************************************/

// Add new page to post type through function here.
