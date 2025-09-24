<?php
/**
 * Theme Functions for Online Grocery Theme
 */

/**
 * Register custom block styles.
 */

add_action('after_setup_theme', function () {
	add_theme_support('woocommerce');
	add_theme_support('woocommerce-block-templates');
	
	add_theme_support('block-templates');
	add_theme_support('block-template-parts');
});

if (!function_exists('online_grocery_block_styles')):
	function online_grocery_block_styles()
	{

		register_block_style(
			'core/details',
			array(
				'name' => 'arrow-icon-details',
				'label' => __('Arrow icon', 'online-grocery-theme'),
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}
				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}
				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);

		register_block_style(
			'core/post-terms',
			array(
				'name' => 'pill',
				'label' => __('Pill', 'online-grocery-theme'),
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}
				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);

		register_block_style(
			'core/list',
			array(
				'name' => 'checkmark-list',
				'label' => __('Checkmark', 'online-grocery-theme'),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}
				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);

		register_block_style(
			'core/navigation-link',
			array(
				'name' => 'arrow-link',
				'label' => __('With arrow', 'online-grocery-theme'),
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					display: inline-block;
				}',
			)
		);

		register_block_style(
			'core/heading',
			array(
				'name' => 'asterisk',
				'label' => __('With asterisk', 'online-grocery-theme'),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}
				.is-style-asterisk:empty:before,
				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}
				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}
				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}
				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;
add_action('init', 'online_grocery_block_styles');


if (!function_exists('online_grocery_block_stylesheets')):
	function online_grocery_block_stylesheets()
	{
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'online-grocery-button-style-outline',
				'src' => get_parent_theme_file_uri('assets/css/button-outline.css'),
				'ver' => wp_get_theme(get_template())->get('Version'),
				'path' => get_parent_theme_file_path('assets/css/button-outline.css'),
			)
		);
	}
endif;
add_action('init', 'online_grocery_block_stylesheets');


if (!function_exists('online_grocery_pattern_categories')):
	function online_grocery_pattern_categories()
	{
		register_block_pattern_category(
			'online_grocery_page',
			array(
				'label' => _x('Pages', 'Block pattern category', 'online-grocery-theme'),
				'description' => __('A collection of full page layouts.', 'online-grocery-theme'),
			)
		);
	}
endif;
add_action('init', 'online_grocery_pattern_categories');


function online_grocery_enqueue_styles()
{
	wp_enqueue_style(
		'online-grocery-woocommerce-css',
		get_stylesheet_directory_uri() . '/assets/css/category.css',
		array(),
		wp_get_theme()->get('Version')
	);
	wp_enqueue_style(
		'online-grocery-button-css',
		get_stylesheet_directory_uri() . '/assets/css/button-style.css',
		array(),
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'online_grocery_enqueue_styles');


function online_grocery_enqueue_editor_scripts()
{
	wp_enqueue_script(
		'online-grocery-editor',
		get_theme_file_uri('/assets/js/editor.js'),
		array('wp-blocks', 'wp-dom'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('enqueue_block_editor_assets', 'online_grocery_enqueue_editor_scripts');


//-------------------------Login And Sign Up------------------------------->

// Enqueue custom scripts and styles
function custom_login_register_scripts() {
    wp_enqueue_script('custom-auth-js', get_template_directory_uri() . '/assets/js/auth.js', array('jquery'), '1.0', true);
    wp_enqueue_style('custom-auth-css', get_template_directory_uri() . '/assets/css/auth.css', array(), '1.0');
    
    // Localize script for AJAX URLs
    wp_localize_script('custom-auth-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url()
    ));
}
add_action('wp_enqueue_scripts', 'custom_login_register_scripts');

// Handle user registration
function handle_user_registration() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['register_nonce'], 'register_action')) {
        wp_die('Security check failed');
    }

    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        wp_send_json_error('All fields are required.');
    }

    if ($password !== $confirm_password) {
        wp_send_json_error('Passwords do not match.');
    }

    if (!is_email($email)) {
        wp_send_json_error('Invalid email address.');
    }

    if (username_exists($username)) {
        wp_send_json_error('Username already exists.');
    }

    if (email_exists($email)) {
        wp_send_json_error('Email already exists.');
    }

    // Create new user
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        wp_send_json_error($user_id->get_error_message());
    }

    // Log the user in automatically after registration
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    wp_send_json_success('Registration successful! Redirecting...');
}
add_action('wp_ajax_nopriv_register_user', 'handle_user_registration');

// Handle user login
function handle_user_login() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['login_nonce'], 'login_action')) {
        wp_die('Security check failed');
    }

    $username = sanitize_user($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    // Validation
    if (empty($username) || empty($password)) {
        wp_send_json_error('Username and password are required.');
    }

    // Attempt login
    $creds = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => $remember
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        wp_send_json_error('Invalid username or password.');
    }

    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, $remember);

    wp_send_json_success('Login successful! Redirecting...');
}
add_action('wp_ajax_nopriv_login_user', 'handle_user_login');

// Check if user is logged in and redirect to dashboard
function redirect_logged_in_users() {
    if (is_user_logged_in() && (is_page('login') || is_page('register'))) {
        wp_redirect(home_url('/dashboard'));
        exit;
    }
}
add_action('template_redirect', 'redirect_logged_in_users');

// Protect dashboard page
function protect_dashboard_page() {
    if (is_page('dashboard') && !is_user_logged_in()) {
        wp_redirect(home_url('/login'));
        exit;
    }
}
add_action('template_redirect', 'protect_dashboard_page');

// Create necessary pages on theme activation
function create_auth_pages() {
    $pages = array(
        'login' => array(
            'title' => 'Login',
            'content' => '<!-- wp:shortcode -->[customer_login]<!-- /wp:shortcode -->'
        ),
        'register' => array(
            'title' => 'Register',
            'content' => '<!-- wp:shortcode -->[customer_register]<!-- /wp:shortcode -->'
        ),
        'dashboard' => array(
            'title' => 'Dashboard',
            'content' => '<!-- wp:paragraph --><p>Welcome to your dashboard!</p><!-- /wp:paragraph -->'
        )
    );

    foreach ($pages as $slug => $page) {
        if (!get_page_by_path($slug)) {
            wp_insert_post(array(
                'post_title' => $page['title'],
                'post_content' => $page['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $slug
            ));
        }
    }
}
add_action('after_switch_theme', 'create_auth_pages');

// Shortcode for login form
function customer_login_shortcode() {
    if (is_user_logged_in()) {
        return '<p>You are already logged in. <a href="' . home_url('/dashboard') . '">Go to Dashboard</a> | <a href="' . wp_logout_url(home_url()) . '">Logout</a></p>';
    }

    ob_start();
    ?>
    <div id="customer-login-form">
        <form id="login-form" method="post">
            <?php wp_nonce_field('login_action', 'login_nonce'); ?>
            <div class="form-group">
                <label for="login-username">Username or Email</label>
                <input type="text" id="login-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <div id="login-message"></div>
        <p>Don't have an account? <a href="<?php echo home_url('/register'); ?>">Register here</a></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('customer_login', 'customer_login_shortcode');

function customer_register_shortcode() {
    if (is_user_logged_in()) {
        return '<p>You are already logged in. <a href="' . home_url('/dashboard') . '">Go to Dashboard</a> | <a href="' . wp_logout_url(home_url()) . '">Logout</a></p>';
    }

    ob_start();
    ?>
    <div id="customer-register-form">
        <form id="register-form" method="post">
            <?php wp_nonce_field('register_action', 'register_nonce'); ?>
            <div class="form-group">
                <label for="register-username">Username</label>
                <input type="text" id="register-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" name="password" required>
            </div>
            <div class="form-group">
                <label for="register-confirm-password">Confirm Password</label>
                <input type="password" id="register-confirm-password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <div id="register-message"></div>
        <p>Already have an account? <a href="<?php echo home_url('/login'); ?>">Login here</a></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('customer_register', 'customer_register_shortcode');


//----------------------------------Login and sign Up-------------------------->

