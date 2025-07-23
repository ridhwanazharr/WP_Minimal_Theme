<?php
/**
 * custiom_wp_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 *
 * @package custiom_wp_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function custiom_wp_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on custiom_wp_theme, use a find and replace
		* to change 'custiom_wp_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'custiom_wp_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Header Menu', 'custiom_wp_theme' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'custiom_wp_theme' ),
		)
	);

	add_theme_support('editor-styles');

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
			'custiom_wp_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
}
add_action( 'after_setup_theme', 'custiom_wp_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function custiom_wp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'custiom_wp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'custiom_wp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function custiom_wp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'custiom_wp_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'custiom_wp_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'custiom_wp_theme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function custiom_wp_theme_scripts() {
	wp_enqueue_style( 'custiom_wp_theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'custiom_wp_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'custiom_wp_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custiom_wp_theme_custom-jquery', get_template_directory_uri() . '/js/jquery.js', array( 'jquery' ) );
	wp_enqueue_style( 'custiom_wp_theme-css', get_template_directory_uri() . '/css/basic-monochrome.css' );
	wp_enqueue_style( 'custiom_wp_theme-fa-icon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'custiom_wp_theme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add Custom Blocks
 */

function custiom_wp_theme_enqueue_block_editor_assets() {
     wp_register_script(
        'custiom-wp-theme-contact-info',
        get_template_directory_uri() . '/blocks/contact-info/block.js',
        array( 'wp-blocks', 'wp-element' ),
        filemtime( get_template_directory() . '/blocks/contact-info/block.js' ),
        true
    ); 

	wp_register_script(
        'custiom-wp-theme-contact-form',
        get_template_directory_uri() . '/blocks/contact-form/block.js',
        array( 'wp-blocks', 'wp-element' ),
        filemtime( get_template_directory() . '/blocks/contact-form/block.js' ),
        true
    ); 

}
add_action( 'enqueue_block_editor_assets', 'custiom_wp_theme_enqueue_block_editor_assets' );


function custiom_wp_theme_register_blocks() {
    register_block_type( get_template_directory() . '/blocks/contact-info/block.json' );
	register_block_type( get_template_directory() . '/blocks/contact-form/block.json' );
}
add_action( 'init', 'custiom_wp_theme_register_blocks' );

