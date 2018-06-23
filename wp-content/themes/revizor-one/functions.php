<?php
/**
 * revizor.one functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package revizor.one
 */

if ( ! function_exists( 'revizor_one_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function revizor_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on revizor.one, use a find and replace
		 * to change 'revizor-one' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'revizor-one', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'revizor-one' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
endif;
add_action( 'after_setup_theme', 'revizor_one_setup' );

/**
 * Enqueue scripts and styles.
 */
function revizor_one_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_style( 'revizor-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css' ), false );

	if ( is_front_page() ) {
		wp_enqueue_script( 'revizor-vue', get_template_directory_uri() . '/js/vue.js', array(), '2.5.16', true );
		//wp_enqueue_script( 'revizor-vue', get_template_directory_uri() . '/js/vue.min.js', array(), '2.5.16', true );
	}

	wp_enqueue_script( 'revizor-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), filemtime(get_template_directory() . '/js/owl.carousel.min.js'), true );
	wp_enqueue_script( 'revizor-masked-input', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array(), filemtime(get_template_directory() . '/js/jquery.maskedinput.min.js'), true );
	wp_enqueue_script( 'revizor-script', get_template_directory_uri() . '/js/bundle.js', array('revizor-vue', 'revizor-carousel', 'revizor-masked-input'), filemtime(get_template_directory() . '/js/bundle.js'), true );

}
add_action( 'wp_enqueue_scripts', 'revizor_one_scripts' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

include('include.image-sizes.php'); // Размеры картинок
include('include.image-html.php'); // Генератор html для картинок
include('include.custom-post-type-service.php'); // Кастомный пост - услуги
include('include.ajax-news.php'); // Вывод новостей по 6

/* Создаем глобальные настройки */
function ea_acf_options_page() {
  if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
      'page_title'  => 'Основные настройки',
      'menu_title' => 'Основные настройки',
      'menu_slug'  => 'global-options',
      'capability' => 'edit_posts',
      'redirect'  => false
    ) );
  }
}
add_action( 'init', 'ea_acf_options_page' );

/* —------------------------------------------------------------------------
 * Отключаем Emojii
 * —------------------------------------------------------------------------ */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
remove_action('welcome_panel', 'wp_welcome_panel');
add_filter('xmlrpc_enabled', '__return_false');

function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
// Удаляем код meta name="generator"
remove_action( 'wp_head', 'wp_generator' );
// Удаляем вывод /feed/
remove_action( 'wp_head', 'feed_links', 2 );
// Удаляем вывод /feed/ для записей, категорий, тегов и подобного
remove_action( 'wp_head', 'feed_links_extra', 3 );

function remove_admin_bar() {
   show_admin_bar(false);
 }

 add_action('after_setup_theme', 'remove_admin_bar');