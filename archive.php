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
	archive.php
</p>
<main>
	<section role="main">
		<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h1><?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h1>Topic: <?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Article Archives</h1>
		<?php } ?>

			<ul>
			<?php while (have_posts()) : the_post(); ?>
			<li <?php post_class() ?>>
				<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

				<?php the_excerpt(); ?>

				<aside class="postmetadata"> <?php the_tags('Topics: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> on <time datetime="<?php the_time('c'); ?>"><?php the_time('l, F jS, Y') ?></time></aside>
			</li>
			<?php endwhile; ?>
			</ul>

			<?php pagination(); ?>
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
	</section>
	<aside role="complementary">
		<?php get_sidebar(); ?>
	</aside>
</main>

<?php get_footer();?>
