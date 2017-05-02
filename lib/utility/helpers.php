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

/**
 * Check whether a given page is an ancestor of another
 *
 * @param  int   $id  The ID of the parent post
 * @return bool       simple true/false
 */
function is_tree($pid) {
    global $post;
    if( is_page() && ($post->post_parent==$pid || is_page($pid)) ):
        return true;
    else:
        return false;
    endif;
};


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
 * Get a post's ACF image, with specific dimension
 *
 * @param  string  $key   The ACF key for the image
 * @param string   $size  The image size, based on add_image_size();
 * @param  int     $id    The ID of the post
 *
 * @return string         The full URL of the given ACF image
 */
function wpst_get_acf_image_url($key = 'image', $size = 'full', $id = '') {

    if( $id == '' ):
        global $post;
        $id = $post->ID;
    endif;

    // default output false
    $output = '';

    // get ACF field
    $image = get_field($key, $id);

    // if field is present
    if( !empty($image) ):
        $output = !empty($image['sizes'][$size]) ? $image['sizes'][$size] : $image['url'];
    else:
        $output = false;
    endif;

    return $output;
}

/**
 * Adding a cache busting parameter of the theme's current
 * version to the end of a file.
 *
 * @param   string  $url  The URL of the file to modify
 * @return  string  The updated file URL
 */
function wpst_file_cache_busting ($url) {
	// Get theme info
	$theme = wp_get_theme();
	$theme_version = $theme->get('Version');

	$output = $url . '?ver=' . $theme_version;

	return $output;
}



