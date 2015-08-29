<?php

/**
 *******************************************************************************
 * Functions
 *******************************************************************************
 *
 * This file is used to change tunnecessaryhe default behavior of WordPress.
 * The modifications should each be saved within their own partial, housed within
 * your 'lib' folder.
 *
 * - Admin
 * - Theme
 * - Navigation
 * - Shortcodes
 * - Utility
 *
 */



/**
 * Admin
 ******************************************************************************/

require_once( 'lib/admin.php' );



/**
 * Theme
 ******************************************************************************/

require_once( 'lib/theme.php' );



/**
 * Navigation
 ******************************************************************************/

require_once( 'lib/nav.php' );



/**
 * Post Types
 ******************************************************************************/

require_once( 'lib/post-types/example.php' );
// Each post type should be required separately



/**
 * Taxonomies
 ******************************************************************************/

require_once( 'lib/taxonomies/example.php' );
// Each taxonomy should be required separately



/**
 * Shortcodes
 *
 * Setup WP shortcodes
 * - Update to HTML5 standard shortcodes
 * - remove html tags around shortcodes
 * - create new shortcodes
 ******************************************************************************/

require_once( 'lib/shortcodes.php' );
