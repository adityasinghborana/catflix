<nav class="flex items-center justify-between bg-transparent py-4 px-20 text-white">
    <!-- Logo -->
    <div class="text-lg font-bold">
        <?php 
        if (has_custom_logo()) {
            // Display the custom logo
            the_custom_logo();
        } else {
            // Fallback text if no logo is set
            echo '<a href="' . esc_url(home_url('/')) . '" class="text-white">MyTheme</a>';
        }
        ?>
    </div>

    <!-- Conditional Content -->
    <ul class="flex space-x-4">
        <?php if (is_user_logged_in()) : ?>
            <!-- Navigation Links for Logged-In Users -->
            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-red-500">Home</a></li>
            <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="hover:text-red-500">About</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="hover:text-red-500">Contact</a></li>
        <?php else : ?>
            <!-- Login and Signup Buttons for Guests -->
            <li><a href="<?php echo wp_login_url(); ?>" class="bg-red px-4 py-2 rounded hover:bg-rose-900">Login</a></li>
          
        <?php endif; ?>
    </ul>
</nav>
