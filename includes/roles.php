<?php
/*
Register Beer Walker role
*/

function beerwalk_register_role() {
  add_role('beer_walker', 'Beer Walker');
}

/*
Remove Beer Walker role
*/

function beerwalk_remove_role() {
  remove_role('beer_walker', 'Beer Walker');
}

/*
Grant Beerwalk-level capabilities to Administrator, Editor and Beer Walker
*/

function beerwalk_add_capabilities() {
  $roles = array('administrator', 'editor', 'beer_walker');
  foreach ($roles as $the_role) {
    $role = get_role( $the_role );
    $role->add_cap('read');
    $role->add_cap('edit_beerwalks');
    $role->add_cap('publish_beerwalks');
    $role->add_cap('edit_published_beerwalks');
  }

  $manager_roles = array('administrator', 'editor');
  foreach ($manager_roles as $the_role) {
    $role = get_role( $the_role );
    $role->add_cap('read_private_tasks');
    $role->add_cap('edit_others_beerwalks');
    $role->add_cap('edit_private_beerwalks');
    $role->add_cap('delete_beerwalks');
    $role->add_cap('delete_published_beerwalks');
    $role->add_cap('delete_private_beerwalks');
    $role->add_cap('delete_others_beerwalks');
  }
}

/*
Remove Beerwalk-level capabilities to Administrator, Editor and Beer Walker
*/

function beerwalk_remove_capabilities() {

  $manager_roles = array('administrator', 'editor');
  foreach ($manager_roles as $the_role) {
    $role = get_role( $the_role );
    $role->remove_cap('read');
    $role->remove_cap('edit_beerwalks');
    $role->remove_cap('publish_beerwalks');
    $role->remove_cap('edit_published_beerwalks');
    $role->remove_cap('read_private_tasks');
    $role->remove_cap('edit_others_beerwalks');
    $role->remove_cap('edit_private_beerwalks');
    $role->remove_cap('delete_beerwalks');
    $role->remove_cap('delete_published_beerwalks');
    $role->remove_cap('delete_private_beerwalks');
    $role->remove_cap('delete_others_beerwalks');
  }
}

 ?>
