<?php
// Define the Movie Loop Shortcode
function banner_shortcode($atts) {
    ob_start();

    // Include the navbar template part
    get_template_part('components/banner');

    return ob_get_clean();
}
add_shortcode('banner_short', 'banner_shortcode');
