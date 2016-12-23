<?php
/**
 * @package 	WordPress
 * @subpackage  derekmorash
 * @author		Derek Morash
 * @copyright	Derek Morash
 * @version		1.0
 * @since 		11/20/16
 *
 */

if ( ! function_exists( 'derekmorash_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function derekmorash_setup() {
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
		'primary' => esc_html__( 'Primary', 'derekmorash' ),
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
add_action( 'after_setup_theme', 'derekmorash_setup' );

function derekmorash_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'derekmorash_deregister_scripts' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
* Utility Functions For Development and Debugging
*/
function show($obj, $die=FALSE) {
	echo "<pre>\n";
	print_r($obj);
	echo "\n</pre>\n";
	if($die) {
		die();
	}
}


/**
* Override excerpt length
*/
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
	return 20;
}


/**
* Change [...] into 'read more' link
*/
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
	return '...';
}

?>
