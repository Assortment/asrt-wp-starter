<?php

/**
 *******************************************************************************
 * Shortcodes: Reset
 *******************************************************************************
 *
 * Creating a baseline for shortcodes, including updating the defaults to
 * HTML5 based syntax and removing any fluff along the way.
 *
 * $. HTML5 support
 * $. Clean shortcodes
 *
 */



/**
 * HTML5 support
 ******************************************************************************/

// Allow default WP shortcodes to use HTML5 markup
add_theme_support('html5', ['caption', 'gallery']);



/**
 * Clean shortcodes
 ******************************************************************************/

/**
 * Remove any 'p' or 'br' tags from around the shortcodes that have come
 * from the WYSIWYG areas
 */
function wpst_clean_shortcodes( $content ){

    // Get any instances of 'p' or 'br' tags and remove them
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    // Update the $content to reflect this
    $content = strtr( $content, $array );

    // Return this to the content area
    return $content;
}

add_filter( 'the_content', 'wpst_clean_shortcodes' );
