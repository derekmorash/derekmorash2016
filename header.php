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

?>
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Styles and Fonts -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
<link href="https://fonts.googleapis.com/css?family=Ubuntu:700" rel="stylesheet">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header role="banner" class="site-header">
	<?php if(is_front_page()) : ?>
		<h1 class="logo"><a href="/">Derek Morash</a></h1>
	<?php else : ?>
		<div class="logo"><a href="/">Derek Morash</a></div>
	<?php endif; ?>
	<p><?php echo get_bloginfo( 'description' ); ?></p>
	<nav role="navigation" id="site-navigation" class="site-navigation">
		<?php wp_nav_menu( array('theme_location' => 'main_menu', 'container' => FALSE, 'fallback_cb' => FALSE)); ?>
	</nav>
</header>
