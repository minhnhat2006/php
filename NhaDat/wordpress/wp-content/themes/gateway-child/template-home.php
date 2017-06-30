<?php
/**
 *
 * Template Name: Home
 *
 */

get_header( 'home' ); ?>

<div class="featured-posts">
	<div class="center">
		<h2>Dự án nổi bật</h2>
		<h5>Chúng tôi mang đến cho bạn đầy đủ thông tin các dự án bất động sản nổi bật nhất hiện nay</h5>
	</div>
	<div class="row">
		<?php
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => 'project-post',
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '6',
				'post__not_in'	    => get_option('sticky_posts'),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'home' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 
			// Restore original Post Data
			wp_reset_postdata(); 
		?>
	</div><!-- .row -->
	<div class="lnk-btn">
		<a href="project-post">Xem tất cả</a>
	</div>
</div><!-- .featured-posts -->


<div class="featured-posts background-gray1">
	<div class="center">
		<h2>Nhà đất bán nổi bật</h2>
		<h5>Chúng tôi đồng hành với bạn từ quá trình tìm kiếm cho đến khi giao dịch thành công ngôi nhà yêu thích của bạn.</h5>
	</div>
	<div class="row">
		<?php
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => 'project-post',
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '6',
				'post__not_in'	    => get_option('sticky_posts'),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'home' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 
			// Restore original Post Data
			wp_reset_postdata(); 
		?>
	</div><!-- .row -->
	<div class="lnk-btn">
		<a href="project-post">Xem tất cả</a>
	</div>
</div><!-- .featured-posts -->

<div class="featured-posts background-gray2">
	<div class="center">
		<h2>Nhà đất thuê nổi bật</h2>
		<h5>Chúng tôi đồng hành với bạn từ quá trình tìm kiếm cho đến khi giao dịch thành công ngôi nhà yêu thích của bạn.</h5>
	</div>
	<div class="row">
		<?php
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => 'project-post',
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '6',
				'post__not_in'	    => get_option('sticky_posts'),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'home' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 
			// Restore original Post Data
			wp_reset_postdata(); 
		?>
	</div><!-- .row -->
	<div class="lnk-btn">
		<a href="project-post">Xem tất cả</a>
	</div>
</div><!-- .featured-posts -->

<div class="featured-posts">
	<div class="center">
		<h2>Toà nhà nổi bật</h2>
		<h5>Chúng tôi mang đến cho bạn đầy đủ thông tin các toà nhà bất động sản nổi bật nhất hiện nay.</h5>
	</div>
	<div class="row">
		<?php
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => 'project-post',
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '6',
				'post__not_in'	    => get_option('sticky_posts'),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'home' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 
			// Restore original Post Data
			wp_reset_postdata(); 
		?>
	</div><!-- .row -->
	<div class="lnk-btn">
		<a href="project-post">Xem tất cả</a>
	</div>
</div><!-- .featured-posts -->

<div class="featured-posts background-gray2">
	<div class="center">
		<h2>Khu dân cư</h2>
		<h5>Thông tin cơ bản, đánh giá những đặc điểm nổi bật và tình hình thị trường nhà đất của các khu dân cư tại TP. Hồ Chí Minh</h5>
	</div>
	<div class="row">
		<?php
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => 'project-post',
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '6',
				'post__not_in'	    => get_option('sticky_posts'),
			);
			// The Query
			$query = new WP_Query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'home' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 
			// Restore original Post Data
			wp_reset_postdata(); 
		?>
	</div><!-- .row -->
	<div class="lnk-btn">
		<a href="project-post">Xem tất cả</a>
	</div>
</div><!-- .featured-posts -->

<?php get_footer(); ?>
