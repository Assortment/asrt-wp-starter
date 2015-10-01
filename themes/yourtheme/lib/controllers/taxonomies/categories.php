<?php

/**
 *******************************************************************************
 * Taxonomy queries: Categories
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
 * $. Setters
 ******************************************************************************/

// Add new term to the taxonomy through function here.
