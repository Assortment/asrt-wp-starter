<?php

/**
 *******************************************************************************
 * Public Example
 *******************************************************************************
 *
 * This is an example post type which you can use as a baseline for your
 * project's needs. The idea of a `public` post type is one which a user
 * would navigate to through permalinks, rather than something you'd just
 * integrate onto your website via queries.
 *
 */



function wpst_post_type_example () {
    register_post_type(
        'example',
        array(
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'page',
            'hierarchical' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-unlock',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'examples', 'with_front' => false ),
            'supports' => array( 'title', 'page-attributes', 'editor', 'excerpt', 'revisions' ),
            'labels' => array(
                'name' => __( 'Examples' ),
                'singular_name' => __( 'Example' ),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add New Example' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Example' ),
                'new_item' => __( 'New Example' ),
                'view' => __( 'View' ),
                'view_item' => __( 'View Example' ),
                'search_items' => __( 'Search Examples' ),
                'not_found' => __( 'No Examples found' ),
                'not_found_in_trash' => __( 'No Examples found in Trash' )
            )
        )
    );
}

add_action('init', 'wpst_post_type_example');
