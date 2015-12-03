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
 * @param  int     $count   Number of posts you'd like to bring through.
 * @return object           WP_Query instance
 */
function wpst_get_pages ( $parent = null, $count = -1 ) {

    // Define arguments for query.
    $args = array(
        'post_type'      => 'page',
        'post_parent'    => 0,
        'posts_per_page' => $count,
        'order'          => $order_by,
        'orderby'        => 'ID'
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
