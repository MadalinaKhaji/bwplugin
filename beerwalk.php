<?php
/*
Plugin Name: Beerwalk Plugin
Description: Beerwalk manager
Author: Maddie
Version: 1.0
Text Domain: beerwalk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
*/

/*
Register Beerwalk post type
*/
require_once plugin_dir_path(__FILE__) . 'includes/posttypes.php';
register_activation_hook(__FILE__, 'beerwalk_rewrite_flush');

/*
Register Beer Walker role
*/
require_once plugin_dir_path(__FILE__) . 'includes/roles.php';
register_activation_hook(__FILE__, 'beerwalk_register_role');
register_deactivation_hook(__FILE__, 'beerwalk_remove_role');

/*
Add capabilities
*/
register_activation_hook(__FILE__, 'beerwalk_add_capabilities');
register_deactivation_hook(__FILE__, 'beerwalk_remove_capabilities');

/*
Add in CMB2 for new fields
*/
require_once plugin_dir_path(__FILE__) . 'includes/CMB2_functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/CMB2_attach_post_functions.php';

/*
Grant task access for index pages for certain users
*/
add_action('pre_get_posts', 'beerwalk_grant_access');

function beerwalk_grant_access($query) {
  if(isset($query->query_vars['post_type'])) {
    if($query->query_vars['post_type'] == 'beerwalk') {
      if(defined('REST_REQUEST') && REST_REQUEST) {
        IF(current_user_can('editor') || current_user_can('administrator')) {
          $query->set('post_status', 'private');
        } elseif (current_user_can('beer_walker')) {
          $query->set('post_status', 'private');
          $query->set('author', get_current_user_id());
        }
      }
    }
  }
}



/*
function beerwalk_scripts() {
  if(!is_admin() && is_page( array('beerwalk'))) {

    if(is_user_logged_in() && current_user_can('edit_others_posts')) {
      wp_enqueue_script('beerwalk_script', plugin_dir_url(__FILE__) . 'JS/beerwalk.ajax.js', array('jquery'), '0.1', true);
      wp_localize_script('beerwalk_script', 'WPsettings', array(
        'root' => esc_url_raw( rest_url()),
        'nonce' => wp_create_nonce('wp_rest'),
        'current_ID' => get_the_ID()
      ));
    }
  }
}

add_action('wp_enqueue_scripts', 'beerwalk_scripts');
*/
 ?>
