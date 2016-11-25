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
	<article role="main">
		<h1>Error 404 - Page Not Found</h1>
		<p>We don't have a page for that web address.</p>
		<p>Could be a broken link or a typo &mdash; try one of these pages.</p>
		<ul class="sitemap">
			<?php wp_list_pages('title_li=&depth=3'); ?>
		</ul>
	</article>
</main>

<?php get_footer();?>
