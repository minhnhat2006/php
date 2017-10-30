<?php
/**
 * Template Name: Full Width
 *
 * @package WordPress
 * @subpackage Hometown
 * @since 1.0
 */

get_header();

while ( have_posts() ) : the_post();
	the_content();
endwhile;

wp_reset_query(); //resetting the page query

get_footer(); ?>