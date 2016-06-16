<?php

function alliance_post() {
  $labels = array(
    'name'               => _x( 'Alliances', 'post type general name' ),
    'singular_name'      => _x( 'Alliance', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'alliance' ),
    'add_new_item'       => __( 'Add New Alliance' ),
    'edit_item'          => __( 'Edit Alliance' ),
    'new_item'           => __( 'New Alliance' ),
    'all_items'          => __( 'All Alliances' ),
    'view_item'          => __( 'View Alliance' ),
    'search_items'       => __( 'Search Alliances' ),
    'not_found'          => __( 'No alliances found' ),
    'not_found_in_trash' => __( 'No alliances found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Alliances'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'alliance', $args ); 
}
add_action( 'init', 'alliance_post' );

function treaty_post() {
  $labels = array(
    'name'               => _x( 'Treaties', 'post type general name' ),
    'singular_name'      => _x( 'Treaty', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Treaty' ),
    'add_new_item'       => __( 'Add New Treaty' ),
    'edit_item'          => __( 'Edit Treaty' ),
    'new_item'           => __( 'New Treaty' ),
    'all_items'          => __( 'All Treaties' ),
    'view_item'          => __( 'View Treaty' ),
    'search_items'       => __( 'Search Treaties' ),
    'not_found'          => __( 'No treaties found' ),
    'not_found_in_trash' => __( 'No treaties found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Treaties'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'treaty', $args ); 
}
add_action( 'init', 'treaty_post' );

?>