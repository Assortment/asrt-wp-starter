<?php

/**
 *******************************************************************************
 * Example
 *******************************************************************************
 *
 * This is an example taxonomy which you can use as a baseline for your
 * project's needs.
 *
 */



function wpst_taxonomy_example () {
    register_taxonomy(
        'example',
        array( 'post-type' ),
        array(
            'labels' => array(
                'name' => __( 'Examples' ),
                'singular_name' => __( 'Example' ),
                'search_items' => __( 'Search Examples' ),
                'popular_items' => __( 'Popular Examples' ),
                'all_items' => __( 'All Examples' ),
                'parent_item' => __( 'Parent Example' ),
                'parent_item_colon' => __( 'Parent Example:' ),
                'edit_item' => __( 'Edit Example' ),
                'update_item' => __( 'Update Example' ),
                'add_new_item' => __( 'Add New Example' ),
                'new_item_name' => __( 'New Example' ),
            ),
            'public' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'examples', 'with_front' => false ),
        )
    );
}

add_action('init', 'wpst_taxonomy_example');
