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
<!--[if lt IE 9]>	  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<meta charset="utf-8">

<title><?php wp_title('|'); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- |||||||||||||||||||||||||| For Web Apps only ||||||||||||||||||||||| -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="apple-touch-startup-image" href="/img/splash.png" />
<!-- |||||||||||||||||||||||||| For Web Apps only ||||||||||||||||||||||| -->

<!-- Styles and Fonts -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
<link href="https://fonts.googleapis.com/css?family=Ubuntu:700" rel="stylesheet">

<!-- Icons for Bookmarks, tabs and 'Add to homescreen'-like functionality -->
<link href="<?php bloginfo('template_url'); ?>/img/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/img/shortcut.png" />

<script>
	document.createElement('canvas').getContext || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/html5shiv.js"><\/script>');
</script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header role="banner" id="site-header">
	<?php if(is_front_page()) : ?>
		<h1 class="logo">Derek Morash</h1>
	<?php else : ?>
		<a href="/" class="logo">Derek morash</a>
	<?php endif; ?>
	<nav role="navigation" id="site-navigation">
		<?php wp_nav_menu( array('theme_location' => 'main_menu', 'container' => FALSE, 'fallback_cb' => FALSE)); ?>
	</nav>
</header>
