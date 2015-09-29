<?php

/**
 *******************************************************************************
 * Queries
 *******************************************************************************
 *
 * A hub for all the different queries your project will need. Queries
 * refer mainly to times when you want to pool the database, usually
 * through a `WP_Query` or `query_posts` function.
 *
 * $. Post types
 * $. Taxonomies
 * $. Other
 *
 */



/**
 * $. Post types
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
 * $. Taxonomies
 ******************************************************************************/

/**
 * Get category terms.
 *
 * @param  int   | Define the parent page of the pages you're getting.
 * @return array | Array of Category objects.
 */
function wpst_get_categories ( $parent = null ) {

    // Define arguments for query.
    $args = array();

    // If param is declared, add to arguments
    if( !is_null($parent) ):
        $args['parent'] = $parent;
    endif;

    // New instance of WP_Query class.
    $output = get_categories( $args );

    // Return the results
    return $output;
}



/**
 * Other
 ******************************************************************************/

// Add other query sections here.
// For example WordPress users and other meta data.
