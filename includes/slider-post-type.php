<?php
// Register the Custom Post Type
// Register the Custom Post Type for Slider
function create_slider_post_type() {
    $args = array(
        'label'               => 'Sliders',
        'description'         => 'A custom post type for Slider',
       
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'supports'            => array('title', 'thumbnail'),
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'slider'),
        'show_in_rest'        => true,
        'labels' => array(
        'name'               => 'Sliders',
        'singular_name'      => 'Slider',
        'add_new'            => 'Add New Slider',
        'add_new_item'       => 'Add New Slider',
        'edit_item'          => 'Edit Slider',
        'new_item'           => 'New Slider',
        'view_item'          => 'View Slider',
        'all_items'          => 'All Sliders',
        'search_items'       => 'Search Sliders',
        'not_found'          => 'No Sliders found',
        'not_found_in_trash' => 'No Sliders found in Trash',
        'parent_item_colon'  => 'Parent Sliders:',
        'menu_name'          => 'Sliders'
    ),
    );
    register_post_type('slider', $args);
}
add_action('init', 'create_slider_post_type');

// Add custom fields to the Slider post type
function add_slider_custom_meta_boxes() {
    add_meta_box(
        'slider_meta_box',            // Meta box ID
        'Slider Link',                // Title
        'render_slider_meta_box',     // Callback function to render meta box
        'slider',                     // Post type
        'normal',                     // Context
        'default'                     // Priority
    );
}
add_action('add_meta_boxes', 'add_slider_custom_meta_boxes');

// Render the custom fields (link URL)
function render_slider_meta_box($post) {
    // Nonce for security
    wp_nonce_field('save_slider_meta', 'slider_meta_nonce');
    
    // Get the current link value
    $slider_link = get_post_meta($post->ID, '_slider_link', true);

    ?>
    <label for="slider_link">Slider Link:</label>
    <input type="text" name="slider_link" id="slider_link" value="<?php echo esc_url($slider_link); ?>" class="widefat">
    <?php
}

// Save the custom field value when the post is saved
function save_slider_custom_fields($post_id) {
    // Check if nonce is set
    if (!isset($_POST['slider_meta_nonce']) || !wp_verify_nonce($_POST['slider_meta_nonce'], 'save_slider_meta')) {
        return $post_id;
    }

    // Skip auto saves
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Save the custom field
    if (array_key_exists('slider_link', $_POST)) {
        update_post_meta($post_id, '_slider_link', sanitize_text_field($_POST['slider_link']));
    }
}
add_action('save_post', 'save_slider_custom_fields');
