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
<p>
	index.php
</p>
<main class="site-main">
	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<ul class="post-list">
		<?php while (have_posts()) : the_post(); ?>
		<li <?php post_class() ?>>
			<a href="<?php the_permalink() ?>" rel="bookmark" class="post-list_item" title="Permanent Link to <?php the_title_attribute(); ?>">
				<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>

				<aside class="postmetadata">Posted  on <time datetime="<?php the_time('c'); ?>"><?php the_time('F jS, Y') ?></time></aside>

				<?php the_excerpt(); ?>
			</a>
		</li>
		<?php endwhile; ?>
	</ul>

		<?php
		// pagination(); ?>
	<nav style="text-align:center;">
		<?php posts_nav_link( ' &#183; ', 'Previous Page', 'Next Page' ); ?>
	</nav>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<p>Sorry, but there aren't any posts in the %s category yet.</p>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<p>Sorry, but there aren't any posts with this date.</p>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<p>Sorry, but there aren't any posts by %s yet.</p>", $userdata->display_name);
		} else {
			echo("<p>No posts found.</p>");
		}
		get_search_form();

	endif;
	?>
</main>

<?php get_footer(); ?>
