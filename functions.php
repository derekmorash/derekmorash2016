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

// typically set following sizes in wordpress for content images:
// thumbnail 120x120
// medium    320x320
// large     800x600
add_image_size( 'mobile', 640, 480, TRUE );
add_image_size( 'tablets', 960, 720, TRUE );
add_image_size( 'desktop', 1280, 800, TRUE );

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
add_action( 'after_setup_theme', 'derekmorash_setup' );

/**
* Stop WordPress from loading jQuery in head
*/
function theme_scripts_enqueue() {
	if(!is_admin()) {
		//jQuery is loaded in the actual footer to be able to use a CDN without having to check for it in PHP

		//custom scripts for theme
		// wp_register_script('theme', get_template_directory_uri() . '/js/script.min.js', FALSE, FALSE, TRUE);
		// wp_enqueue_script('theme');
	}
}
// add_action('wp_enqueue_scripts', 'theme_scripts_enqueue');

function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
* body_class() improvements
*/
// add_filter('body_class','useful_body_class_names');
// function useful_body_class_names($classes) {
// 	global $post;
//
// 	if ($post) {
// 		if(is_page()) {
// 			$classes[] = basename(get_permalink());
// 			$classes[] = $post->post_name;
// 		}
//
// 		foreach((get_the_category($post->ID)) as $category) {
// 			$classes[] = $category->category_nicename;
// 		}
// 	}
//
// 	return $classes;
// }



/**
* navigation class improvements
*/
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
// function my_css_attributes_filter($var) {
// 	return is_array($var) ? array_intersect($var, array('current-menu-item', 'current_page_item', 'current_page_ancestor', 'current_page_parent', 'current-page-ancestor')) : '';
// }



/**
* Wrap images in figure tags
*/
// function insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
// 	//$url = wp_get_attachment_url($id);
// 	$src = wp_get_attachment_image_src($id, $size, false);
//
// 	$html5 = '<figure class="align' . $align . '">';
//
// 	if (strlen($url) > 0) {
// 		$html5 .= '<a href="' . $url . '">';
// 	}
//
// 	$html5 .= '<img src="' . $src[0] . '" alt="' . $alt . '" />';
//
// 	if (strlen($url) > 0) {
// 		$html5 .= '</a>';
// 	}
//
// 	if ($caption) {
// 		$html5 .= '<figcaption>' . $caption . '</figcaption>';
// 	}
//
// 	$html5 .= '</figure>';
//
// 	//remove width & heigt attributes
// 	$html5 = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html5 );
//
// 	return $html5;
// }
//
// function remove_width_attribute( $html ) {
//     $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
//     return $html;
// }
//
// add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
// add_filter( 'image_send_to_editor', 'insert_image', 10, 9 );




/**
* Register Menus
*/
// if ( function_exists('register_nav_menus') ) {
// 	add_action( 'init', 'register_theme_menus' );
// 	function register_theme_menus() {
// 		register_nav_menus(
// 			array(
// 				'main_menu' => __( 'Main Menu' )
// 			)
// 		);
// 	}
// }


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
	return 5;
}


/**
* Change [...] into 'read more' link
*/
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
    global $post;
	// return ' <a class="readmore" href="'. get_permalink($post->ID) . '">continue reading</a>';
	return '... <em class="continue">continue reading</em>';
}


/**
* Make category lists valid by removing the
* rel="category tag" attribute
*/
// function remove_category_list_rel($output)
// {
//   $output = str_replace(' rel="category tag"', '', $output);
//   return $output;
// }
// add_filter('wp_list_categories', 'remove_category_list_rel');
// add_filter('the_category', 'remove_category_list_rel');

/**
* Empty search
*/
// function SearchFilter($query) {
//     // If 's' request variable is set but empty
//     if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
//         $query->is_search = true;
//         $query->is_home = false;
//     }
//     return $query;
// }
// add_filter('pre_get_posts','SearchFilter');


?>
