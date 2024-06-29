<?php 

//Adding theme support
function gt_init(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5',
    array('comment-list','comment-form','search-form')
);

}
add_action('after_setup_theme','gt_init');

//custom post type testimonial
function custom_testimonial_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'all_items' => 'All Testimonials',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' => 'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials found in Trash',
        'menu_name' => 'Testimonials'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail','custom-fields'), // Add 'editor' and 'thumbnail' support
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'testimonial'),
        'menu_icon' => 'dashicons-testimonial',
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'custom_testimonial_post_type');


//custom post type Team/agents
function custom_team_post_type() {
    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Team Member',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'all_items' => 'All Team Members',
        'view_item' => 'View Team Member',
        'search_items' => 'Search Team Members',
        'not_found' => 'No Team Members found',
        'not_found_in_trash' => 'No Team Members found in Trash',
        'menu_name' => 'Team'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', 'thumbnail','custom-fields'),
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'team'),
        'menu_icon' => 'dashicons-groups', // Choose an icon from https://developer.wordpress.org/resource/dashicons/
    );

    register_post_type('team', $args);
}
add_action('init', 'custom_team_post_type');



//custom post type listing

function create_listing_post_type()  {
    $labels = array(
        'name' => 'Listing',
        'singular_name' => 'Property Listing',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Property Listing',
        'edit_item' => 'Edit Property Listing',
        'new_item' => 'New Property Listing',
        'all_items' => 'All Property Listings',
        'view_item' => 'View Property Listing',
        'search_items' => 'Search Property Listings',
        'not_found' => 'No Property Listings found',
        'not_found_in_trash' => 'No Property Listings found in Trash',
        'menu_name' => 'Listing'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('', '', ''),
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'listing'),
        'menu_icon' => 'dashicons-admin-home', // Choose an icon from https://developer.wordpress.org/resource/dashicons/
    );

    register_post_type('listing', $args);
}
add_action('init', 'create_listing_post_type');

 // Register Custom Post Type
function create_type_post_type() {
    $labels = array(
        'name'                  => _x( 'Types', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Type', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Types', 'text_domain' ),
        'all_items'             => __( 'All Types', 'text_domain' ),
        'add_new_item'          => __( 'Add New Type', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Type', 'text_domain' ),
        'edit_item'             => __( 'Edit Type', 'text_domain' ),
        'update_item'           => __( 'Update Type', 'text_domain' ),
        'view_item'             => __( 'View Type', 'text_domain' ),
        'search_items'          => __( 'Search Type', 'text_domain' ),
        'not_found'             => __( 'Not Found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    );

    $args = array(
        'label'                 => __( 'Type', 'text_domain' ),
        'description'           => __( 'Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( '', '', '', '' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home', // Choose an icon from https://developer.wordpress.org/resource/dashicons/
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'rewrite'               => array( 'slug' => 'type' ), // Set the slug for the post type
    );

    register_post_type( 'type', $args );
}

// Hook into the 'init' action
add_action( 'init', 'create_type_post_type', 0 );







function custom_search_filter($query) {
    if ($query->is_search && !is_admin()) {
        $search_query = get_search_query();
        $location_query = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
        $property_type_query = isset($_GET['property_type']) ? sanitize_text_field($_GET['property_type']) : '';

        $meta_query = array(
            'relation' => 'AND',
            array(
                'key'     => 'address',
                'value'   => $location_query,
                'compare' => 'LIKE',
            ),
            array(
                'key'     => 'type',
                'value'   => $property_type_query,
                'compare' => 'LIKE',
            ),
        );

        $query->set('post_type', 'listing');
        $query->set('meta_query', $meta_query);
    }
}

add_action('pre_get_posts', 'custom_search_filter');


?>