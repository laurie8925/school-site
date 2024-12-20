<?php

/**
 * School Project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Project
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function school_project_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Project, use a find and replace
		* to change 'school-project' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('school-project', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			// 'menu-1' => esc_html__('Primary', 'school-project'),
			'header-menu' => esc_html__('Header Menu Location', 'school-project'),
			'footer-menu' => esc_html__('Footer Menu Location', 'school-project')
		)
	);

	add_image_size('student-blog', 300, 200, true);
	add_image_size('student-tax-blog', 200, 300, true);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'school_project_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');
	add_theme_support('align-wide');
	add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'school_project_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_project_content_width()
{
	$GLOBALS['content_width'] = apply_filters('school_project_content_width', 640);
}
add_action('after_setup_theme', 'school_project_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_project_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'school-project'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'school-project'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'school_project_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function school_project_scripts()
{
	wp_enqueue_style(
		'fwd-googlefonts', //unique handle
		'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', //url to css file 
		array(), //dependencies 
		null, // Set null if loading multiple Google Fonts from their CDN
		'all' //media
	);

	wp_enqueue_style('school-project-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('school-project-style', 'rtl', 'replace');

	wp_enqueue_script('school-project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'school_project_scripts');


//aos animation
function enqueue_aos_scripts()
{
	// Check if it's a single post of the post type 'post'

	// Enqueue AOS CSS
	wp_enqueue_style('school-aos-css', get_template_directory_uri() . '/assets/aos.css', array(), "1.0.0");

	// Enqueue AOS JS
	wp_enqueue_script('school-aos-js', get_template_directory_uri() . '/assets/aos.js', array(), false, true);
	wp_enqueue_script('school-aos-init-js', get_template_directory_uri() . '/assets/init.js', array("school-aos-js"), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_aos_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Change excerpt length from 55 to 20 words 
function fwd_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'fwd_excerpt_length', 999);

function fwd_excerpt_more($more)
{
	$more = '...';
	return $more;
}
add_filter('excerpt_more', 'fwd_excerpt_more');

//Changes the title in staff to "add staff name"
function change_staff_title_placeholder($title)
{
	$screen = get_current_screen();
	if ($screen->post_type == 'staff') {
		$title = 'Add staff name';
	}
	return $title;
}
add_filter('enter_title_here', 'change_staff_title_placeholder');

//Changes to student CPT
//Restrict Block
function restrict_blocks_for_custom_post_type($settings, $post)
{
	if ($post->post_type == 'students') {
		$settings['allowed_block_types'] = array();
	}
	return $settings;
}
add_filter('block_editor_settings', 'restrict_blocks_for_custom_post_type', 10, 2);

//Changes the title in student to "add student name"
function change_title_placeholder($title)
{
	$screen = get_current_screen();
	if ($screen->post_type == 'students') {
		$title = 'Add student name';
	}
	return $title;
}
add_filter('enter_title_here', 'change_title_placeholder');
