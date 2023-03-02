<?php

// Register custom taxonomy
function doc_taxonomy() {
    $labels = array(
        'name' => __( 'Doc Categories' ),
        'singular_name' => __( 'Doc Category' ),
        'menu_name' => __( 'Doc Categories' ),
        'all_items' => __( 'All Doc Categories' ),
        'edit_item' => __( 'Edit Doc Category' ),
        'view_item' => __( 'View Doc Category' ),
        'update_item' => __( 'Update Doc Category' ),
        'add_new_item' => __( 'Add New Doc Category' ),
        'new_item_name' => __( 'New Doc Category Name' ),
        'parent_item' => __( 'Parent Doc Category' ),
        'search_items' => __( 'Search Doc Categories' ),
        'popular_items' => __( 'Popular Doc Categories' ),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'doc-category' ),
    );

    register_taxonomy( 'doc_category', 'doc', $args );
}
add_action( 'init', 'doc_taxonomy' );
