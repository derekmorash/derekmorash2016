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
<p>
	single.php
</p>
<main>
	<article role="main">
		<h1><?php the_title(); ?></h1>

		<aside class="postmetadata">Posted on <time datetime="<?php the_time('c'); ?>"><?php the_time('l, F jS, Y') ?></time></aside>

		<?php the_content(); ?>
	</article>

	<aside role="complementary">
		<?php get_sidebar(); ?>
	</aside>
</main>

<?php get_footer(); ?>
