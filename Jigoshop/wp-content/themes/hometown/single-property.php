<?php
/**
 * Single Property template
  *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hometown
 * @since 1.0
 * @version 1.0
 */

get_header();

while ( have_posts() ) : the_post();
	ob_start();
	include( get_template_directory() . '/templates/single-property.php');
	$output .= ob_get_clean();
	echo $output;
endwhile;

wp_reset_query(); //resetting the page query

get_footer(); ?>

?>