<?php
/*
* This document has the functionality to create the structures that holds
* the plugin information for Events as Cutsom Post Types
*/


// CUSTOM POST TYPE KN Events
if ( ! function_exists('op_events') ) {

    // Register Custom Post Type
    function op_events() {

        $labels = array(
            'name'                  => _x( 'KN Events', 'Post Type General Name', 'op' ),
            'singular_name'         => _x( 'KN Event', 'Post Type Singular Name', 'op' ),
            'menu_name'             => __( 'KN Events', 'op' ),
            'name_admin_bar'        => __( 'KN Event', 'op' ),
            'archives'              => __( 'Item Archives', 'op' ),
            'attributes'            => __( 'Item Attributes', 'op' ),
            'parent_item_colon'     => __( 'Parent Item:', 'op' ),
            'all_items'             => __( 'KN Events', 'op' ),
            'add_new_item'          => __( 'Add New Item', 'op' ),
            'add_new'               => __( 'Add New', 'op' ),
            'new_item'              => __( 'New Item', 'op' ),
            'edit_item'             => __( 'Edit Item', 'op' ),
            'update_item'           => __( 'Update Item', 'op' ),
            'view_item'             => __( 'View Item', 'op' ),
            'view_items'            => __( 'View Items', 'op' ),
            'search_items'          => __( 'Search Item', 'op' ),
            'not_found'             => __( 'Not found', 'op' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'op' ),
            'featured_image'        => __( 'Featured Image', 'op' ),
            'set_featured_image'    => __( 'Set featured image', 'op' ),
            'remove_featured_image' => __( 'Remove featured image', 'op' ),
            'use_featured_image'    => __( 'Use as featured image', 'op' ),
            'insert_into_item'      => __( 'Insert into item', 'op' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'op' ),
            'items_list'            => __( 'Items list', 'op' ),
            'items_list_navigation' => __( 'Items list navigation', 'op' ),
            'filter_items_list'     => __( 'Filter items list', 'op' ),
        );
        $rewrite = array(
            'slug'                  => 'event',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'KN Events', 'op' ),
            'description'           => __( 'These are the KN Events', 'op' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'menu_position'         => 2,
            'menu_icon'             => OP_PLUGIN_URI . '/backend/images/favicon-op.png',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'events',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'op_event', $args );

    }
    add_action( 'init', 'op_events', 0 );

}
