<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class(); ?>>

    <div class="content-area">
        <?php
        if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'single' ) ) {
            // Elementor overrides content
        } else {
            // Default WordPress Loop
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        }
        ?>
    </div>
   

    <?php get_footer(); ?>

</body>
</html>
