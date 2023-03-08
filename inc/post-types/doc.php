<?php

function create_doc_post_type() {
    $labels = array(
        'name'               => __( 'Doc' ),
        'singular_name'      => __( 'Doc' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Add New Doc' ),
        'edit_item'          => __( 'Edit Doc' ),
        'new_item'           => __( 'New Doc' ),
        'view_item'          => __( 'View Doc' ),
        'search_items'       => __( 'Search Doc' ),
        'not_found'          => __( 'No docs found' ),
        'not_found_in_trash' => __( 'No docs found in trash' ),
        'parent_item_colon'  => ''
    );

    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'has_archive'        => true,
			'rewrite'            => array( 'slug' => 'docs' ),
      'capability_type'    => 'post',
      'hierarchical'       => false,
			'show_in_rest'       => true,
      'menu_position'      => 80,
      'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
      'menu_icon'          => 'dashicons-welcome-learn-more'
    );

    register_post_type( 'doc', $args );
}
add_action( 'init', 'create_doc_post_type' );
