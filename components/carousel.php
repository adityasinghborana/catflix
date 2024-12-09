<?php
// Query to get the Slider posts
$args = array(
    'post_type' => 'slider',
    'posts_per_page' => -1, // Show all posts
);

$query = new WP_Query($args);

if ($query->have_posts()) :
?>
<!-- Embla Carousel Structure -->
<div class="embla overflow-hidden">
    <div class="embla__viewport">
        <div class="embla__container flex">
            <?php
            while ($query->have_posts()) : $query->the_post();
                $slider_link = get_post_meta(get_the_ID(), '_slider_link', true); // Get the custom link
                $slider_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image
            ?>
            <!-- Slide -->
            <div class="embla__slide w-full h-screen flex justify-center items-center bg-gray-200  text-2xl font-semibold text-center">
                <a href="<?php echo esc_url($slider_link); ?>" target="_blank">
                    <img src="<?php echo esc_url($slider_image); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover">
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- Previous and Next Buttons -->
    <button class="embla__prev absolute top-1/2 left-4 transform -translate-y-1/2 px-4 py-2 bg-white bg-opacity-50 text-white rounded"><span><</span></button>
    <button class="embla__next absolute top-1/2 right-4 transform -translate-y-1/2 px-4 py-2 bg-white bg-opacity-50 text-white rounded"><span>></span></button>
</div>
<?php
wp_reset_postdata(); // Reset the query
else :
    echo 'No sliders found.';
endif;

