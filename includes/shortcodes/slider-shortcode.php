<?php
// Define the Movie Loop Shortcode
function slider_shortcode($atts) {
    ob_start();

    // Include the navbar template part
    get_template_part('components/carousel');

    return ob_get_clean();
}
add_shortcode('slider_short', 'slider_shortcode');
