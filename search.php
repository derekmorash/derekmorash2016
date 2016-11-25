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
$search_query = $_GET['s'];;
?>

<main>
	<section role="main">
		<?php if (!empty($search_query) && have_posts()) : ?>
		<h1>Search Results for: "<?php echo $search_query; ?>"</h1>

		<ul class="search-results">

		<?php while (have_posts()) : the_post(); ?>
		<li>
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

			<?php the_excerpt(); ?>
		</li>
		<?php endwhile; ?>

		</ul>

		<?php pagination('long'); ?>

		<?php else : ?>
			<h1>No results for: "<?php echo $search_query; ?>"</h1>

			<p>Please try a different search</p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	</section>

	<aside role="complementary">
		<?php get_sidebar(); ?>
	</aside>
</main>

<?php get_footer(); ?>
