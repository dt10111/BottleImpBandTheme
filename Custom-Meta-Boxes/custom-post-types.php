<?php
//--- Reviews ---//

add_action( 'init', 'register_cpt_review' );

function register_cpt_review() {

    $labels = array( 
        'name' => _x( 'Reviews', 'review' ),
        'singular_name' => _x( 'Review', 'review' ),
        'add_new' => _x( 'Add New', 'review' ),
        'add_new_item' => _x( 'Add New Review', 'review' ),
        'edit_item' => _x( 'Edit Review', 'review' ),
        'new_item' => _x( 'New Review', 'review' ),
        'view_item' => _x( 'View Review', 'review' ),
        'search_items' => _x( 'Search Reviews', 'review' ),
        'not_found' => _x( 'No Reviews found', 'review' ),
        'not_found_in_trash' => _x( 'No Reviews found in Trash', 'review' ),
        'parent_item_colon' => _x( 'Parent Review:', 'review' ),
        'menu_name' => _x( 'Reviews', 'review' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail','comments','custom-fields' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => get_bloginfo('template_directory') . '/includes/img/quotes.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'review', $args );
}
//--- Videos ---//

add_action( 'init', 'register_cpt_video' );

function register_cpt_video() {

    $labels = array( 
        'name' => _x( 'Videos', 'video' ),
        'singular_name' => _x( 'Video', 'video' ),
        'add_new' => _x( 'Add New', 'video' ),
        'add_new_item' => _x( 'Add New video', 'video' ),
        'edit_item' => _x( 'Edit Video', 'video' ),
        'new_item' => _x( 'New Video', 'video' ),
        'view_item' => _x( 'View Video', 'video' ),
        'search_items' => _x( 'Search Videos', 'video' ),
        'not_found' => _x( 'No videos found', 'video' ),
        'not_found_in_trash' => _x( 'No videos found in Trash', 'video' ),
        'parent_item_colon' => _x( 'Parent Video:', 'video' ),
        'menu_name' => _x( 'Videos', 'video' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail','comments','custom-fields' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_bloginfo('template_directory') . '/includes/img/video.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'video', $args );
}
//--- Photos ---//

add_action( 'init', 'register_cpt_photo' );

function register_cpt_photo() {

    $labels = array( 
        'name' => _x( 'Photos', 'photo' ),
        'singular_name' => _x( 'Photo', 'photo' ),
        'add_new' => _x( 'Add New', 'photo' ),
        'add_new_item' => _x( 'Add New photo', 'photo' ),
        'edit_item' => _x( 'Edit Photo', 'photo' ),
        'new_item' => _x( 'New Photo', 'photo' ),
        'view_item' => _x( 'View Photo', 'photo' ),
        'search_items' => _x( 'Search Photos', 'photo' ),
        'not_found' => _x( 'No photos found', 'photo' ),
        'not_found_in_trash' => _x( 'No photos found in Trash', 'photo' ),
        'parent_item_colon' => _x( 'Parent Photo:', 'photo' ),
        'menu_name' => _x( 'Photos', 'photo' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail','comments','custom-fields' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_bloginfo('template_directory') . '/includes/img/photo.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'photo', $args );
}
//--- Music Discography ---//

add_action( 'init', 'register_cpt_album' );

function register_cpt_album() {

    $labels = array( 
        'name' => _x( 'Albums', 'album' ),
        'singular_name' => _x( 'Album', 'album' ),
        'add_new' => _x( 'Add New', 'album' ),
        'add_new_item' => _x( 'Add New Album', 'album' ),
        'edit_item' => _x( 'Edit Album', 'album' ),
        'new_item' => _x( 'New Album', 'album' ),
        'view_item' => _x( 'View Album', 'album' ),
        'search_items' => _x( 'Search Albums', 'album' ),
        'not_found' => _x( 'No albums found', 'album' ),
        'not_found_in_trash' => _x( 'No albums found in Trash', 'album' ),
        'parent_item_colon' => _x( 'Parent Album:', 'album' ),
        'menu_name' => _x( 'Discography', 'album' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'thumbnail','comments','custom-fields' ),
        'taxonomies' => array( 'genres' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => get_bloginfo('template_directory') . '/includes/img/albums.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'album', $args );
}

add_action( 'init', 'register_taxonomy_genres' );

function register_taxonomy_genres() {

    $labels = array( 
        'name' => _x( 'Genres', 'genres' ),
        'singular_name' => _x( 'Genre', 'genres' ),
        'search_items' => _x( 'Search Genres', 'genres' ),
        'popular_items' => _x( 'Popular Genres', 'genres' ),
        'all_items' => _x( 'All Genres', 'genres' ),
        'parent_item' => _x( 'Parent Genre', 'genres' ),
        'parent_item_colon' => _x( 'Parent Genre:', 'genres' ),
        'edit_item' => _x( 'Edit Genre', 'genres' ),
        'update_item' => _x( 'Update Genre', 'genres' ),
        'add_new_item' => _x( 'Add New Genre', 'genres' ),
        'new_item_name' => _x( 'New Genre', 'genres' ),
        'separate_items_with_commas' => _x( 'Separate genres with commas', 'genres' ),
        'add_or_remove_items' => _x( 'Add or remove Genres', 'genres' ),
        'choose_from_most_used' => _x( 'Choose from most used Genres', 'genres' ),
        'menu_name' => _x( 'Genres', 'genres' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'genres', array('album','post','video'), $args );
}

