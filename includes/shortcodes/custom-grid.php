<?php

function custom_grid_shortcode($atts) {
    // Set default attributes for the shortcode
    $atts = shortcode_atts(
        array(
            'post_type' => 'post', // Default to 'post' post type
            'posts_per_page' => 6,  // Default to 6 posts
            'order' => 'DESC',      // Default order by 'DESC'
        ),
        $atts,
        'custom_grid' // Shortcode name
    );

    // Prepare the WP_Query arguments based on the shortcode attributes
    $args = array(
        'post_type' => sanitize_text_field($atts['post_type']),
        'posts_per_page' => intval($atts['posts_per_page']),
        'order' => sanitize_text_field($atts['order']),
    );

    // Create the WP_Query
    $query = new WP_Query($args);

    // Start output buffering to capture the content
    ob_start();

    // Pass the query to the template part
    set_query_var('custom_query', $query);
    get_template_part('components/custom-grid');

    // Return the captured content
    return ob_get_clean();
}
add_shortcode('custom_grid', 'custom_grid_shortcode');
