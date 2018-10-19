<?php
/**
 * Register a custom post type called "Beerwalk".
 *
 * @see get_post_type_labels() for label keys.
 */
function beerwalk_cpt_init() {
    $labels = array(
        'name'                  => _x( 'Beerwalks', 'Post type general name', 'beerwalk' ),
        'singular_name'         => _x( 'Beerwalk', 'Post type singular name', 'beerwalk' ),
        'menu_name'             => _x( 'Beerwalks', 'Admin Menu text', 'beerwalk' ),
        'name_admin_bar'        => _x( 'Beerwalk', 'Add New on Toolbar', 'beerwalk' ),
        'add_new'               => __( 'Add New', 'beerwalk' ),
        'add_new_item'          => __( 'Add New Beerwalk', 'beerwalk' ),
        'new_item'              => __( 'New Beerwalk', 'beerwalk' ),
        'edit_item'             => __( 'Edit Beerwalk', 'beerwalk' ),
        'view_item'             => __( 'View Beerwalk', 'beerwalk' ),
        'all_items'             => __( 'All Beerwalks', 'beerwalk' ),
        'search_items'          => __( 'Search Beerwalks', 'beerwalk' ),
        'parent_item_colon'     => __( 'Parent Beerwalks:', 'beerwalk' ),
        'not_found'             => __( 'No Beerwalks found.', 'beerwalk' ),
        'not_found_in_trash'    => __( 'No Beerwalks found in Trash.', 'beerwalk' ),
        'featured_image'        => _x( 'Beerwalk Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'beerwalk' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'beerwalk' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'beerwalk' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'beerwalk' ),
        'archives'              => _x( 'Beerwalk archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'beerwalk' ),
        'insert_into_item'      => _x( 'Insert into Beerwalk', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'beerwalk' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Beerwalk', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'beerwalk' ),
        'filter_items_list'     => _x( 'Filter Beerwalks list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'beerwalk' ),
        'items_list_navigation' => _x( 'Beerwalks list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'beerwalk' ),
        'items_list'            => _x( 'Beerwalks list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'beerwalk' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'beerwalks' ),
        'capability_type'    => 'beerwalk',
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'rest_base'          => 'beerwalks',
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-exerpt-view',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'map_meta_cap'       => true,
    );

    register_post_type( 'beerwalk', $args );
}

add_action( 'init', 'beerwalk_cpt_init' );

/*
Flush rewrite rules on activation
*/
function beerwalk_rewrite_flush() {
  beerwalk_cpt_init();
  flush_rewrite_rules();
}
?>
