<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package metisse
 */

get_header();



if(function_exists('setPostViews')){
	setPostViews(get_the_ID());
}
?>




<?php
get_footer();
