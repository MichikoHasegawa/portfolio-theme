<?php 
 
 function portfolio_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Work', 'post type general name' ),
        'singular_name'      => _x( 'Work', 'post type singular name'),
        'menu_name'          => _x( 'Work', 'admin menu' ),
        'name_admin_bar'     => _x( 'Work', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'work' ),
        'add_new_item'       => __( 'Add New Work' ),
        'new_item'           => __( 'New Work' ),
        'edit_item'          => __( 'Edit Work' ),
        'view_item'          => __( 'View Work' ),
        'all_items'          => __( 'All Work' ),
        'search_items'       => __( 'Search Work' ),
        'parent_item_colon'  => __( 'Parent Work:' ),
        'not_found'          => __( 'No work found.' ),
        'not_found_in_trash' => __( 'No work found in Trash.' ),
        'archives'           => __( 'Work Archives'),
        'insert_into_item'   => __( 'Insert into work'),
        'uploaded_to_this_item' => __( 'Uploaded to this work'),
        'filter_item_list'   => __( 'Filter work list'),
        'items_list_navigation' => __( 'Work list navigation'),
        'items_list'         => __( 'Work list'),
        'featured_image'     => __( 'Work featured image'),
        'set_featured_image' => __( 'Set Work featured image'),
        'remove_featured_image' => __( 'Remove Work featured image'),
        'use_featured_image' => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'work' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail','editor' ),
    );
    register_post_type( 'portfolio-work', $args );
}

add_action( 'init', 'portfolio_register_custom_post_types' );

// Fleshes permalinks when switching themes 
function portfolio_rewrite_flush() {
    fwd_register_custom_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'portfolio_rewrite_flush' );
 