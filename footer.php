<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date('Y'); ?> My Website. All rights reserved.</p>
        <nav class="footer-nav">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?> <!-- This is important for WordPress and plugins to function properly -->
</body>
</html>
