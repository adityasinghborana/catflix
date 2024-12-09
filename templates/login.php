<?php
/* Template Name: Custom Login Page */

if (is_user_logged_in()) {
    wp_redirect(home_url()); // Redirect logged-in users to the homepage
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['log'] ?? '';
    $password = $_POST['pwd'] ?? '';

    $credentials = [
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => isset($_POST['remember']),
    ];

    $user = wp_signon($credentials, is_ssl());

    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        wp_redirect(home_url()); // Redirect on successful login
        exit;
    }
}

get_header(); ?>
<div class="container mx-auto p-8 h-full flex items-center ">
    <div class="max-w-xl w-1/3 mx-auto bg-gray-800 text-white bg-red rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Login</h1>

        <?php if (!empty($error)): ?>
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <?php echo esc_html($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label for="log" class="block text-sm font-medium">Username</label>
                <input type="text" name="log" id="log" class="w-full mt-2 p-2 rounded bg-gray-700 text-white" required>
            </div>

            <div class="mb-4">
                <label for="pwd" class="block text-sm font-medium">Password</label>
                <input type="password" name="pwd" id="pwd" class="w-full mt-2 p-2 rounded bg-gray-700 text-black" required>
            </div>

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-red-500">
                    <span class="ml-2 text-sm">Remember Me</span>
                </label>
                <a href="<?php echo wp_lostpassword_url(); ?>" class="text-sm text-blue-400 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full bg-black hover:bg-blackDark text-white font-bold py-2 px-4 rounded">
                Login
            </button>
        </form>

        <p class="mt-4 text-sm">
            Don't have an account? <a href="<?php echo wp_registration_url(); ?>" class="text-blue-400 hover:underline">Sign Up</a>
        </p>
    </div>
</div>

