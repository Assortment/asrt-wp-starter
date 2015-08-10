<?php

/**
 ***************************************************************************
 * Admin area
 ***************************************************************************
 *
 * This file is used to create a baseline for the admin area.
 *
 * - Remove toolbar on front-end (appears when logged in)
 * - Remove pages (links, comments, etc)
 * - Update meta-boxes throughout the admin area
 * - Remove emoji support
 * - Add excerpt support to pages
 * - Add ACF options page
 * - Update permalinks
 * - Allow SVG uploads
 *
 */



/**
 * Remove toolbar on front-end (appears when logged in)
 **************************************************************************/

add_filter( 'show_admin_bar', '__return_false' );



/**
 * Remove pages (links, comments, etc)
 **************************************************************************/

function wpst_remove_menu_pages() {
     remove_menu_page( 'link-manager.php' );
     remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'wpst_remove_menu_pages' );



/**
 * Update meta-boxes throughout the admin area
 **************************************************************************/

/**
 * Remove columns from Posts and Pages listing
 */
function wpst_post_type_columns( $defaults ) {
    if( isset($_GET['post_type']) && $_GET['post_type'] == 'page' ):
        $defaults['id'] = 'Page ID';
    else:
        $defaults['id'] = 'Post ID';
    endif;

    unset( $defaults['comments'] );
    unset( $defaults['author'] );
    unset( $defaults['tags'] );

    if( isset($_GET['post_type']) && $_GET['post_type'] == 'page' ):
        unset( $defaults['date'] );
    endif;

    return $defaults;
}

add_filter( 'manage_posts_columns', 'wpst_post_type_columns' );
add_filter( 'manage_pages_columns', 'wpst_post_type_columns' );

/**
 * Add ID column to Posts and Pages listing
 */
function wpst_fill_id_column( $column_name, $id ) {
    global $post;
    switch ( $column_name ) {
        case 'id':
            echo $id;
            break;
        default:
            break;
    }
}

add_action( 'manage_posts_custom_column', 'wpst_fill_id_column', 10, 2 );
add_action( 'manage_pages_custom_column', 'wpst_fill_id_column', 10, 2 );

