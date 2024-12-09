<?php

// Add support for custom logo
function theme_support_custom_logo() {
    add_theme_support('custom-logo', [
        'height'      => 100, // Recommended height
        'width'       => 400, // Recommended width
        'flex-height' => true, // Allow flexible height
        'flex-width'  => true, // Allow flexible width
        'header-text' => ['site-title', 'site-description'], // Replace these with logo text
    ]);
}
add_action('after_setup_theme', 'theme_support_custom_logo');

// Register Elementor Locations
function my_theme_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'my_theme_register_elementor_locations');

// Enqueue TailwindCSS and custom styles
function mytheme_enqueue_styles() {
    // Enqueue TailwindCSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '3.4.16');
    
    // Enqueue custom style.css
    wp_enqueue_style('custom-style', get_stylesheet_uri(), array('tailwindcss'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

// Include custom post types and meta boxes
require_once get_template_directory() . '/includes/movie-post-type.php';  // Fixed path to the PHP file
require_once get_template_directory() . '/includes/slider-post-type.php';  // Fixed path to the PHP file



//shortcode 
// Include shortcodes file
require_once get_template_directory() . '/includes/shortcodes/custom-grid.php'; // Make sure the path is correct
require_once get_template_directory() . '/includes/shortcodes/banner-shortcode.php'; // Make sure the path is correct
require_once get_template_directory() . '/includes/shortcodes/slider-shortcode.php'; // Make sure the path is correct

add_action('login_redirect', function () {
    wp_redirect(home_url('/login')); // Adjust '/login' to your custom login page slug
    exit;
});

function enqueue_embla_carousel_script() {
    // Enqueue Embla carousel script
    wp_enqueue_script('embla-carousel', 'https://unpkg.com/embla-carousel/embla-carousel.umd.js', array(), null, true);

    // Enqueue your custom script
    wp_enqueue_script('embla-carousel-custom', get_template_directory_uri() . '/js/embla-carousel.js', array('embla-carousel'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_embla_carousel_script');







