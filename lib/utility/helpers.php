<?php

/**
 *******************************************************************************
 * Helpers
 *******************************************************************************
 *
 * Helper functions which makes life easier and remove any unnecessary
 * repetition.
 *
 * $. Conditionals
 *
 */



/**
 * Conditionals
 ******************************************************************************/

// Conditionals here


/**
 * Other
 ******************************************************************************/

/**
 * Get a post's excerpt by its ID
 *
 * @param  int     $id  The ID of the post
 * @return string       The post's excerpt
 */
function wpst_get_excerpt_by_id ( $id ) {

    // Get current post
    $page = get_post($id);

    // Get it's excerpt
    $excerpt = $page->post_excerpt;

    // Return the excerpt
    return $excerpt;
}

/**
 * Adding a cache busting parameter of the theme's current
 * version to the end of a file.
 *
 * @param  string  $url  The URL of the file to modify
 * @return  string  The updated file URL
 */
function wpst_file_cache_busting ($url) {
	// Get theme info
	$theme = wp_get_theme();
	$theme_version = $theme->get('Version');

	$output = $url . '?ver=' . $theme_version;

	return $output;
}



