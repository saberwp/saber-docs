<?php

function create_doc_taxonomy() {
  $labels = array(
    'name' => 'Doc Categories',
    'singular_name' => 'Doc Category',
    'search_items' => 'Search Doc Categories',
    'all_items' => 'All Doc Categories',
    'parent_item' => 'Parent Doc Category',
    'parent_item_colon' => 'Parent Doc Category:',
    'edit_item' => 'Edit Doc Category',
    'update_item' => 'Update Doc Category',
    'add_new_item' => 'Add New Doc Category',
    'new_item_name' => 'New Doc Category Name',
    'menu_name' => 'Doc Categories',
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'doc' ),
    'show_in_rest' => true,
  );

  register_taxonomy( 'doc-category', 'doc', $args );
}
add_action( 'init', 'create_doc_taxonomy' );
