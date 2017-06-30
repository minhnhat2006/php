<?php
/**
 * Template Name: Project
 *
 */

get_header('project'); ?>

<div class="row">

	<div class="center page-intro">
		<h2>Tìm hiểu các dự án bất động sản mới nhất</h2>
		<h5>Chúng tôi lựa chọn cho bạn các dự án bất động sản chất lượng và mới nhất đang trong quá trình mở bán ở TPHCM.<br> Bạn có thể xem thông tin từng dự án và liên hệ ngay với Rever để được tư vấn chi tiết.</h5>

		<div class="lnk-btn">
			<a href="project-post">Liên hệ với chuyên viên</a>
		</div>
	</div>

</div><!-- .row -->

<div class="row background-gray1 entry-container">

	<div id="primary" class="content-area">

		<div class="large-12 columns">

			<main id="main" class="site-main" role="main">

				<?php
					$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
					// Get chosen category
					$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
					// WP_Query arguments
					$args = array (
						'post_type'         => 'project-post',
						'cat'         	    => $home_posts_cat,
						'posts_per_page'    => '15',
						'paged' => $paged,
						'post__not_in'	    => get_option('sticky_posts'),
					);
					// The Query
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post(); 
							get_template_part( 'template-parts/content', 'project' ); 
						}
					} else { 
						get_template_part( 'template-parts/content', 'none' ); 
					} 
				?>

			</main><!-- #main -->

		</div><!-- .large-8 -->
		
	</div><!-- #primary -->

</div><!-- .row -->

<?php
	if (function_exists(custom_pagination)) {
    	custom_pagination($query->max_num_pages, "", $paged);
  	}

	// Restore original Post Data
	wp_reset_postdata(); 
?>

<?php get_footer(); ?>