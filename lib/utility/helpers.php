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

/**
* Generate an archive for use in sidebars for any given post type.
*
* @param string $post_type
* @param string $custom_field_key
* @param string $format
* @param int $limit
* @return array
*/
function wpst_make_an_archive( $post_type = null, $custom_field_key = null, $format = 'Ymd', $limit = 12 ) {

	// Determine when 'now' is
	$now = new DateTime();

	// Load in the $wpdb class
	global $wpdb;

	// If the post type is not specified, assume the current post type
	if ( $post_type == null ) {
	    $post_type = get_post_type();
	}

	// If no custom field is being queried, assume post published date
	if ( $custom_field_key == null ) {

	    // Format 'now' to be wp_posts compatible
	    $now = $now->format('Y-m-d H:i:s');

	    // create a query for post_dates of specified post_type earlier than 'now'
	    $sql = $wpdb->prepare(
		"SELECT post_date AS post_date
		FROM wp_posts
		WHERE post_type = %s AND post_status = 'publish' AND post_date < %s
		ORDER BY post_date DESC",
		$post_type,
		$now
	    );

	} else {

	    // Re-format 'now' to match the custom formatting for the custom field key
	    $now = $now->format( $format );

	    // Fetch an array of valid post_ids to query against
	    $ids = $wpdb->get_results( $wpdb->prepare(
		"SELECT id FROM wp_posts WHERE post_type = %s AND post_status = 'publish'",
		$post_type
	    ), ARRAY_A );

	    // If a valid post_type has valid post_ids
	    if ( $ids ) {

		// concat all the post_ids into a single string starting and ending with brackets
		$in = "(" . implode( ",", array_column( $ids, 'id' ) ) . ")";

		// create a query to lookup the value of the custom field key, limiting to previously
		// defined post_ids and post_date of earlier than 'now'
		$sql = $wpdb->prepare(
		    "SELECT meta_value as post_date
		    FROM wp_postmeta
		    WHERE meta_key = %s AND meta_value < %s AND post_id IN $in
		    ORDER BY post_date DESC",
		    $custom_field_key,
		    $now
		);

	    } else {

		// If the post_type was invalid or no post_ids were found, abort
		return [];
	    }
	}

	// execute the query to return raw DB records that match
	$raw_results = $wpdb->get_results( $sql, ARRAY_A );

	// If records were found
	if ( $raw_results ) {

	    // Select just the 'post_date' column for each db record and turn into a valid
	    // `Y/m` format -> drop any duplicates -> ensure the array_keys are reset
	    $dates = array_values( array_unique( array_map( function( $el ) {
		return (new DateTime( $el ))->format('Y/m');
	    }, array_column( $raw_results, 'post_date' ) ) ) );

	    // using the `Y/m` formatted dates, create a 'key' with a human-friendly 'M Y' format
	    // -> then create a date archive url 'value' out of the `Y/m` format -> split the results
	    // so only the $limit is returned
	    return array_chunk( array_combine( array_map( function( $el ) {
		return DateTime::createFromFormat( 'Y/m', $el )->format('M Y');
	    }, $dates ), array_map( function( $el ) {
		return trailingslashit( home_url( $el ) );
	    }, $dates ) ), $limit )[0];

	} else {

	    // if no records match the query, abort
	    return [];
	}

}
