<?php
// Register the Custom Post Type
function create_movie_post_type() {
    $args = array(
        'label'               => 'Movies',
        'description'         => 'A custom post type for movies',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'movies'),
        'show_in_rest'        => true,
        'taxonomies'          => array('movie_category'),  // Change category to movie_category
        'labels'              => [
            'name'               => 'Movies',
            'singular_name'      => 'Movie',
            'add_new'            => 'Add New Movie',
            'add_new_item'       => 'Add New Movie',
            'edit_item'          => 'Edit Movie',
            'view_item'          => 'View Movie',
            'all_items'          => 'All Movies',
            'search_items'       => 'Search Movies',
            'not_found'          => 'No Movies found',
            'not_found_in_trash' => 'No Movies found in Trash',
            'parent_item_colon'  => 'Parent Movies:',
            'menu_name'          => 'Movies'
        ]
    );
    register_post_type('movie', $args);
}
add_action('init', 'create_movie_post_type');

// Register Custom Taxonomy for Movies (renaming category)
function create_movie_category_taxonomy() {
    $args = array(
        'hierarchical'        => true,
        'labels'              => [
            'name'              => 'Movie Categories',
            'singular_name'     => 'Movie Category',
            'search_items'      => 'Search Movie Categories',
            'all_items'         => 'All Movie Categories',
            'parent_item'       => 'Parent Movie Category',
            'parent_item_colon' => 'Parent Movie Category:',
            'edit_item'         => 'Edit Movie Category',
            'update_item'       => 'Update Movie Category',
            'add_new_item'      => 'Add New Movie Category',
            'new_item_name'     => 'New Movie Category Name',
            'menu_name'         => 'Movie Categories'
        ],
        'rewrite'             => array('slug' => 'movie-category'),
        'show_ui'             => true,
        'show_admin_column'   => true,
        'show_in_rest'        => true
    );
    register_taxonomy('movie_category', 'movie', $args);
}
add_action('init', 'create_movie_category_taxonomy');

// Add Custom Meta Boxes
function movie_custom_meta_boxes() {
    add_meta_box('movie_rating', 'Movie Rating', 'movie_rating_callback', 'movie', 'side', 'high');
    add_meta_box('movie_duration', 'Movie Duration', 'movie_duration_callback', 'movie', 'side', 'high');
    add_meta_box('movie_genre', 'Movie Genre', 'movie_genre_callback', 'movie', 'side', 'high');
}
add_action('add_meta_boxes', 'movie_custom_meta_boxes');

// Callback for Movie Rating Field
function movie_rating_callback($post) {
    $rating = get_post_meta($post->ID, '_movie_rating', true);
    echo '<input type="text" name="movie_rating" value="' . esc_attr($rating) . '" />';
}

// Callback for Movie Duration Field
function movie_duration_callback($post) {
    $duration = get_post_meta($post->ID, '_movie_duration', true);
    echo '<input type="text" name="movie_duration" value="' . esc_attr($duration) . '" />';
}

// Callback for Movie Genre Field
function movie_genre_callback($post) {
    $genre = get_post_meta($post->ID, '_movie_genre', true);
    echo '<input type="text" name="movie_genre" value="' . esc_attr($genre) . '" />';
}

// Save the Custom Fields
function save_movie_custom_fields($post_id) {
    if (array_key_exists('movie_rating', $_POST)) {
        update_post_meta($post_id, '_movie_rating', sanitize_text_field($_POST['movie_rating']));
    }

    if (array_key_exists('movie_duration', $_POST)) {
        update_post_meta($post_id, '_movie_duration', sanitize_text_field($_POST['movie_duration']));
    }

    if (array_key_exists('movie_genre', $_POST)) {
        update_post_meta($post_id, '_movie_genre', sanitize_text_field($_POST['movie_genre']));
    }
}
add_action('save_post', 'save_movie_custom_fields');
