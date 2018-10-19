<?php
/**
* Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
*
* Be sure to replace all instances of 'beerwalk_' with your project's prefix.
* http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
*
* @category YourThemeOrPlugin
* @package  Demo_CMB2
* @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
* @link     https://github.com/CMB2/CMB2
*/


if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


/**
* Only show this box in the CMB2 REST API if the user is logged in.
*
* @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
* @param  CMB2_REST_Controller $cmb_controller The controller object.
*                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
*
* @return bool                 Whether this box and its fields are allowed to be viewed.
*/
function beerwalk_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

add_action( 'cmb2_init', 'beerwalk_register_rest_api_box' );
/**
* Hook in and add a box to be available in the CMB2 REST API. Can only happen on the 'cmb2_init' hook.
* More info: https://github.com/CMB2/CMB2/wiki/REST-API
*/
function beerwalk_register_rest_api_box() {
	$prefix = 'beerwalk_';

	$cmb_rest = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Beer Walk Data', 'beerwalk' ),
		'object_types'  => array( 'beerwalk' ), // Post type
		'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
		// Optional callback to limit box visibility.
		// See: https://github.com/CMB2/CMB2/wiki/REST-API#permissions
		'get_box_permissions_check_cb' => 'beerwalk_limit_rest_view_to_logged_in_users',
	) );

	$cmb_rest->add_field( array(
		'name'    => esc_html__( 'Beer Walk Rating', 'beerwalk' ),
		'desc'    => esc_html__( 'field description (optional)', 'beerwalk' ),
		'id'      => $prefix . 'radio',
		'type'    => 'radio',
		'options' => array(
			'1' => esc_html__( 'Bad', 'beerwalk' ),
			'2' => esc_html__( 'Not good', 'beerwalk' ),
			'3' => esc_html__( 'Good', 'beerwalk' ),
			'4' => esc_html__( 'Very good', 'beerwalk' ),
			'5' => esc_html__( 'Excellent', 'beerwalk' ),
		),
	) );
}
