<?php
/*
* This document has the functionality to create the structures that holds
* the plugin information for Events as Taxonomies
*/

// CUSTOM TAXONOMY CATEGORY
if ( ! function_exists( 'op_events_category' ) ) {

// Register Custom Taxonomy
function op_events_category() {

	$labels = array(
		'name'                       => _x( 'Events Categories', 'Taxonomy General Name', 'schnell' ),
		'singular_name'              => _x( 'Events Category', 'Taxonomy Singular Name', 'schnell' ),
		'menu_name'                  => __( 'Events Categories', 'schnell' ),
		'all_items'                  => __( 'All Events Categories', 'schnell' ),
		'parent_item'                => __( 'Parent Item', 'schnell' ),
		'parent_item_colon'          => __( 'Parent Item:', 'schnell' ),
		'new_item_name'              => __( 'New Item Name', 'schnell' ),
		'add_new_item'               => __( 'Add New Item', 'schnell' ),
		'edit_item'                  => __( 'Edit Item', 'schnell' ),
		'update_item'                => __( 'Update Item', 'schnell' ),
		'view_item'                  => __( 'View Item', 'schnell' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'schnell' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'schnell' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'schnell' ),
		'popular_items'              => __( 'Popular Items', 'schnell' ),
		'search_items'               => __( 'Search Items', 'schnell' ),
		'not_found'                  => __( 'Not Found', 'schnell' ),
		'no_terms'                   => __( 'No items', 'schnell' ),
		'items_list'                 => __( 'Items list', 'schnell' ),
		'items_list_navigation'      => __( 'Items list navigation', 'schnell' ),
	);
	$rewrite = array(
		'slug'                       => 'events-category',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'op-events-cat', array( 'op_event' ), $args );

}
add_action( 'init', 'op_events_category', 0 );

}
