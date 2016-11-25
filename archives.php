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

?>

<main>
	<section role="main">
		<h1>Blog Archives by Month</h1>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>

		<h1>Blog Archives by Subject</h1>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>
	</section>

	<aside role="complementary">
		<?php get_sidebar(); ?>
	</aside>
</main>

<?php get_footer();?>
