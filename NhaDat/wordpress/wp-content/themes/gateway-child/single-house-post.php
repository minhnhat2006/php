<?php
/**
 * The template for displaying all single posts.
 *
 */

get_header('project'); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/content', 'single-house' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>