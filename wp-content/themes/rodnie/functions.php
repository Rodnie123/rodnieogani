<?php
/**
 * scratchtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package scratchtheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'scratchtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function scratchtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on scratchtheme, use a find and replace
		 * to change 'scratchtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'scratchtheme', get_template_directory() . '/languages' );

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
				// 'menu-1' => esc_html__( 'Primary', 'scratchtheme' ),
				'top-menu' => __('Top Menu', 'theme'),

			)
		);

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
				'scratchtheme_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'scratchtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scratchtheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'scratchtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'scratchtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scratchtheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'scratchtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'scratchtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'scratchtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scratchtheme_scripts() {
	wp_enqueue_style( 'scratchtheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'scratchtheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'scratchtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'select', get_template_directory_uri(). '/js/jquery.nice-select.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri(). '/js/jquery-ui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri(). '/js/jquery.slicknav.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri(). '/js/mixitup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl', get_template_directory_uri(). '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri(). '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scratchtheme_scripts' );

 function load_stylesheets()
{
	
	wp_register_style('font', get_template_directory_uri(). '/css/font-awesome.min.css', array(), 1 , 'all');
	wp_enqueue_style('font');
	wp_register_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array(), 1 , 'all');
	wp_enqueue_style('bootstrap');
	wp_register_style('icons', get_template_directory_uri(). '/css/elegant-icons.css', array(), 1 , 'all');
	wp_enqueue_style('icons');
	wp_register_style('select', get_template_directory_uri(). '/css/nice-select.css', array(), 1 , 'all');
	wp_enqueue_style('select');
	wp_register_style('jquery-ui', get_template_directory_uri(). '/css/jquery-ui.min.css', array(), 1 , 'all');
	wp_enqueue_style('jquery-ui');
	wp_register_style('owl', get_template_directory_uri(). '/css/owl.carousel.min.css', array(), 1 , 'all');
	wp_enqueue_style('owl');
	wp_register_style('slicknav', get_template_directory_uri(). '/css/slicknav.min.css', array(), 1 , 'all');
	wp_enqueue_style('slicknav');
	wp_register_style('custom', get_template_directory_uri(). '/custom.css', array(), 1 , 'all');
	wp_enqueue_style('custom');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');




// <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
//     <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
//     <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
//     <link rel="stylesheet" href="css/nice-select.css" type="text/css">
//     <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
//     <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
//     <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
//     <link rel="stylesheet" href="css/custom.css" type="text/css">


// function addjs()
// {
	
// 	wp_register_script('jquery-min', get_template_directory_uri(). '/js/jquery-3.3.1.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('jquery');
// 	wp_register_script('bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('bootstrap');
// 	wp_register_script('select', get_template_directory_uri(). '/js/jquery.nice-select.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('select');
// 	wp_register_script('jquery-ui', get_template_directory_uri(). '/js/jquery-ui.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('jquery-ui');
// 	wp_register_script('slicknav', get_template_directory_uri(). '/js/jquery.slicknav.js', array() , 1, 1);
// 	wp_enqueue_scripts('slicknav');
// 	wp_register_script('mixitup', get_template_directory_uri(). '/js/mixitup.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('mixitup');
// 	wp_register_script('owl', get_template_directory_uri(). '/js/owl.carousel.min.js', array() , 1, 1);
// 	wp_enqueue_scripts('owl');
// 	wp_register_script('main-js', get_template_directory_uri(). '/js/main.js', array() , 1, 1);
// 	wp_enqueue_scripts('main-js');
// }
// add_action('wp_enqueue_scripts', 'addjs');
// <script src="js/jquery-3.3.1.min.js"></script>
//     <script src="js/bootstrap.min.js"></script>
//     <script src="js/jquery.nice-select.min.js"></script>
//     <script src="js/jquery-ui.min.js"></script>
//     <script src="js/jquery.slicknav.js"></script>
//     <script src="js/mixitup.min.js"></script>
//     <script src="js/owl.carousel.min.js"></script>
//     <script src="js/main.js"></script>
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

