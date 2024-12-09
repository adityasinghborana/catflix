<div class="relative  overflow-hidden">
    <div class="embla">
        <div class="embla__viewport ">
            <div class="embla__container flex w-1/5 ">
                <?php
                // Get the custom query passed from the shortcode
                $query = get_query_var('custom_query');

                // Check if there are posts to display
                if ($query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="embla__slide  p-4 bg-primary rounded-lg shadow-md hover:scale-110 hover:transition-all duration-1000 hover:bg-blackDark">
                            <!-- Post Thumbnail -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="mb-4">
                                    <?php the_post_thumbnail('medium', ['class' => 'rounded-2xl w-full  min-h-[200px] max-h-[201px] object-cover']); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Post Title -->
                            <div class="item-details px-4">
                                <p class="text-white text-xl font-semibold mb-2"><?php the_title(); ?></p>

                                <!-- Custom Fields (optional) -->
                                <div class="custom-details flex justify-between text-sm text-gray-500">
                                    <?php
                                    // Example: Get custom fields (if any)
                                    $custom_field = get_post_meta(get_the_ID(), '_custom_field', true);
                                    if ($custom_field): ?>
                                        <p class="text-white30"><strong>Custom Field:</strong> <?php echo esc_html($custom_field); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;

                    // Pagination (if needed)
                    the_posts_navigation();

                else:
                    echo '<p>No posts found.</p>';
                endif;

                // Reset the post data
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <!-- Previous and Next Buttons for Embla Carousel -->
        <button class="embla__prev absolute top-1/2 left-4 transform -translate-y-1/2 px-4 py-2 bg-white bg-opacity-50 text-white rounded">
            <span>&#8592;</span> <!-- Left arrow icon -->
        </button>
        <button class="embla__next absolute top-1/2 right-4 transform -translate-y-1/2 px-4 py-2 bg-white bg-opacity-50 text-white rounded">
            <span>&#8594;</span> <!-- Right arrow icon -->
        </button>
    </div>
</div>
