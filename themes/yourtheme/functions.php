<?php

/**
 *******************************************************************************
 * Functions
 *******************************************************************************
 *
 * This file is used to change the default behavior of WordPress. The
 * changes, however, should each be within their own partial; to be
 * housed in your 'lib' folder.
 *
 * - Admin area
 * - Front-end
 * - Shortcodes
 *
 */



/**
 * Admin area
 ******************************************************************************/

require_once( 'lib/admin.php' );



/* Front-end
 *
 * Baseline for front-end area.
 * - queue jQuery correctly
 * - remove thumbnail dimensions
 * - Gravity forms
 * - Image sizes (additions + updates)
 * - Register Nav Menus
 * - Create Nav Walker
 ******************************************************************************/

require_once( 'lib/theme.php' );


/* Shortcodes
 *
 * Setup WP shortcodes
 * - Update to HTML5 standard shortcodes
 * - remove html tags around shortcodes
 * - create new shortcodes
 ******************************************************************************/

require_once( 'lib/shortcodes.php' );
