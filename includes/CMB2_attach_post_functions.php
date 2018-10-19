<?php
/*
* Example setup for the custom Attached Posts field for CMB2.
*/

/**
* Get the bootstrap! If using as a plugin, REMOVE THIS!
*/
require_once plugin_dir_path( __FILE__ ) . 'CMB2/init.php';
require_once plugin_dir_path( __FILE__ ) . 'cmb2-attached-posts/cmb2-attached-posts-field.php';

/**
* Define the metabox and field configurations.
*
* @param  array $meta_boxes
* @return array
*/

function cmb2_attached_beerwalks_field_metaboxes() {
	$beerwalk_meta = new_cmb2_box( array(
		'id'           => 'cmb2_attached_posts_field',
		'title'        => __( 'Attached Posts', 'beerwalk' ),
		'object_types' => array( 'beerwalk' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false,
		'show_in_rest' => WP_REST_Server::ALLMETHODS,
		'get_box_permissions_check_cb' => 'beerwalk_limit_rest_view_to_logged_in_users',
	));

	$beerwalk_meta->add_field( array(
		'name'    => __( 'Attached Posts', 'beerwalk' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'beerwalk' ),
		'id'      => 'attached_cmb2_attached_posts',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'beerwalk',
			), // override the get_posts args
		),
	) );

	$beerwalk_meta->add_field( array(
		'name'    => __( 'Attached Users', 'beerwalk' ),
		'desc'    => __( 'Drag users from the left column to the right column to attach them to this page.<br />You may rearrange the order of the users in the right column by dragging and dropping.', 'beerwalk' ),
		'id'      => 'attached_cmb2_attached_users',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_users'     => true, // Do users instead of posts/custom-post-types.
		),
	) );

}

add_action( 'cmb2_init', 'cmb2_attached_beerwalks_field_metaboxes' );

function cmb2_attached_places_field_metaboxes() {

	$place_meta = new_cmb2_box( array(
		'id'           => 'cmb2_attached_posts_field',
		'title'        => __( 'Attached Posts', 'place' ),
		'object_types' => array( 'place' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false, // Show field names on the left
		'show_in_rest' => WP_REST_Server::ALLMETHODS,
		'get_box_permissions_check_cb' => 'beerwalk_limit_rest_view_to_logged_in_users',
	) );

	$place_meta->add_field( array(
		'name'    => __( 'Attached Posts', 'place' ),
		'desc'    => __( 'Drag posts from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'place' ),
		'id'      => 'attached_cmb2_attached_posts',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array(
				'posts_per_page' => 10,
				'post_type'      => 'place',
			), // override the get_posts args
		),
	) );

	$place_meta->add_field( array(
		'name'    => __( 'Attached Users', 'place' ), // ? OR place
		'desc'    => __( 'Drag users from the left column to the right column to attach them to this page.<br />You may rearrange the order of the users in the right column by dragging and dropping.', 'place' ),
		'id'      => 'attached_cmb2_attached_users',
		'type'    => 'custom_attached_posts',
		'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_users'     => true, // Do users instead of posts/custom-post-types.
		),
	) );
}

// CHANGE POSTS TO PLACES
//add_action( 'cmb2_init', 'cmb2_attached_places_field_metaboxes' );
