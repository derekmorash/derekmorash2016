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

	$subnav = FALSE;
	$ancestors = get_post_ancestors($post);
	$nav_first_id = array_pop($ancestors);

	if($nav_first_id) {
		$subnav = wp_list_pages("title_li=&depth=1&child_of=" . $nav_first_id . "&echo=0");

	} else {
		if($post->ID) {
			$subnav = wp_list_pages("title_li=&depth=1&child_of=" . $post->ID . "&echo=0");
		}
	}

?>
<?php
	if ($subnav):
		?>
		<nav>
			<ul>

				<?php
					echo $subnav;
				?>

			</ul>
		</nav>

		<?php
	endif;

	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets') ){
		/* Widgets get generated here */
	} ?>
