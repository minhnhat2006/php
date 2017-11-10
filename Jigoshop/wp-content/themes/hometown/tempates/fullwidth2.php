<?php
/**
 * Template Name: Full Width 2
 *
 * @package WordPress
 * @subpackage Hometown
 * @since 1.0
 */

get_header('flat-property');

while ( have_posts() ) : the_post();
	the_content();
endwhile;

wp_reset_query(); //resetting the page query

get_footer(); ?>