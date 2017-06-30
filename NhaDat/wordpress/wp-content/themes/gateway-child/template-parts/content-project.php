<?php
/**
 * The template used for displaying content in template-project.php
 */
?>

<div class="large-12 columns entry-detail">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

		<div class="entry-image">

			<?php // Featured Image
			if ( has_post_thumbnail() ) { 
				echo '<a href="' . esc_url( get_permalink() ) . '">';
				the_post_thumbnail( 'post-image' );
			} // end featured image ?>
			</a>
		</div><!-- .featured-image -->

		<div class="entry-content">

			<div class="entry-dd">
				<h5><?php the_field( 'diadiem' ); ?></h5>
			</div><!-- .entry-date -->

			<div class="entry-title">
				<h3><?php the_title(); ?></h3>
			</div>

			<div class="entry-size">
				<ul>
					<li class="fa fa-building"> 2 block</li>
					<li class="fa fa-bed"> 900 căn</li>
				</ul>
			</div>

			<div class="entry-desc">
				<?php the_content(); ?>
			</div>

			<div class="entry-more">
				<a href="#">Xem thêm</a>
			</div>

		</div><!-- .featured-image -->

	</article><!-- #post-## -->

</div><!-- .large-4 -->