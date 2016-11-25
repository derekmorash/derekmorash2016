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

<main>
	<?php echo get_the_post_thumbnail($post->ID, 'full', array('id' => 'contentheader')); ?>

	<article role="main">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>

	<aside role="complementary">
		<?php get_sidebar(); ?>
	</aside>
</main>

<?php get_footer(); ?>
