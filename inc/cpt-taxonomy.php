<?php
/**
 * Register a custom post type for staff that only supports the title.
 */
function custom_post_type_staff() {
    $labels = array(
        'name'                  => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Staff', 'text_domain' ),
        'name_admin_bar'        => __( 'Staff', 'text_domain' ),
        'archives'              => __( 'Staff Archives', 'text_domain' ),
        'attributes'            => __( 'Staff Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Staff:', 'text_domain' ),
        'all_items'             => __( 'All Staff', 'text_domain' ),
        'add_new_item'          => __( 'Add New Staff', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Staff', 'text_domain' ),
        'edit_item'             => __( 'Edit Staff', 'text_domain' ),
        'update_item'           => __( 'Update Staff', 'text_domain' ),
        'view_item'             => __( 'View Staff', 'text_domain' ),
        'view_items'            => __( 'View Staff', 'text_domain' ),
        'search_items'          => __( 'Search Staff', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Staff', 'text_domain' ),
        'description'           => __( 'Staff Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'staff', $args );
}
add_action( 'init', 'custom_post_type_staff', 0 );

// Register Custom Taxonomy for Staff
function custom_taxonomy_staff() {
    $labels = array(
        'name'                       => _x( 'Staff Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Staff Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Staff Category', 'text_domain' ),
        'all_items'                  => __( 'All Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent Category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Category', 'text_domain' ),
        'update_item'                => __( 'Update Category', 'text_domain' ),
        'view_item'                  => __( 'View Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Categories', 'text_domain' ),
        'search_items'               => __( 'Search Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'staff_category', array( 'staff' ), $args );
}
add_action( 'init', 'custom_taxonomy_staff', 0 );

// Add Terms "Faculty" and "Administrative" to Staff Category Taxonomy
function add_staff_taxonomy_terms() {
    wp_insert_term(
        'Faculty',
        'staff_category',
        array(
            'description' => 'Faculty Members',
            'slug' => 'faculty'
        )
    );
    wp_insert_term(
        'Administrative',
        'staff_category',
        array(
            'description' => 'Administrative Staff',
            'slug' => 'administrative'
        )
    );
}
add_action( 'init', 'add_staff_taxonomy_terms', 10 );


//custom post type for students
function custom_post_type_student() {
    $labels = array(
        'name'                  => _x( 'Students', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Student', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Students', 'text_domain' ),
        'name_admin_bar'        => __( 'Students', 'text_domain' ),
        'archives'              => __( 'Student Archives', 'text_domain' ),
        'attributes'            => __( 'Student Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Student:', 'text_domain' ),
        'all_items'             => __( 'All Students', 'text_domain' ),
        'add_new_item'          => __( 'Add New Student', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Student', 'text_domain' ),
        'edit_item'             => __( 'Edit Student', 'text_domain' ),
        'update_item'           => __( 'Update Student', 'text_domain' ),
        'view_item'             => __( 'View Student', 'text_domain' ),
        'view_items'            => __( 'View Students', 'text_domain' ),
        'search_items'          => __( 'Search Student', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Student', 'text_domain' ),
        'description'           => __( 'Student Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ), // 'editor' for Block Editor
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'student', $args );
}
add_action( 'init', 'custom_post_type_student', 0 );