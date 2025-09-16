<?php
/**
 * Theme Functions for Online Grocery Theme
 */

/**
 * Register custom block styles.
 */

add_action('after_setup_theme', function () {
	// Tell WooCommerce our theme supports block templates
	add_theme_support('woocommerce');
	add_theme_support('woocommerce-block-templates');
	
	// Register header and footer support
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

/**
 * Enqueue block stylesheets.
 */
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

/**
 * Register pattern categories.
 */
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

/**
 * Enqueue frontend custom CSS.
 */
function online_grocery_enqueue_styles()
{
	wp_enqueue_style(
		'online-grocery-woocommerce-css',
		get_stylesheet_directory_uri() . '/assets/css/woocommerce.css',
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

/**
 * Enqueue editor JS.
 */
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

/**
 * Register header and footer template parts
 */
function online_grocery_register_template_parts() {
	register_block_template_part(
		array(
			'id' => 'online-grocery-header',
			'area' => 'header',
			'title' => 'Online Grocery Header',
			'description' => 'Header template part for Online Grocery Theme',
		)
	);
	
	register_block_template_part(
		array(
			'id' => 'online-grocery-footer',
			'area' => 'footer',
			'title' => 'Online Grocery Footer',
			'description' => 'Footer template part for Online Grocery Theme',
		)
	);
}
add_action('init', 'online_grocery_register_template_parts');