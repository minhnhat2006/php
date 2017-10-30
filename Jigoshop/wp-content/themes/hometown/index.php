<?php
/**
 * The main template file
  *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hometown
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php get_footer(); ?>