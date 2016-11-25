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

$v = (is_search() ? $_GET['s'] : '');
?>

<form role="search" method="get" id="searchform" action="/" >
	<input type="search" value="<?php echo $v; ?>" name="s" placeholder="Search" />
	<button type="submit">Search</button>
</form>
