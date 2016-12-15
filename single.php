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

get_header();
the_post();
?>

<main class="site-main">
	<article role="main" class="blog-post">
		<header class="blog-post_header">
			<h1><?php the_title(); ?></h1>

			<aside class="postmetadata">Posted on <time datetime="<?php the_time('c'); ?>"><?php the_time('F jS, Y') ?></time></aside>
		</header>

		<?php the_content(); ?>
	</article>
</main>

<?php get_footer(); ?>
