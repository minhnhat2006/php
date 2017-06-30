<?php
/**
 * The template used for displaying content in template-home.php
 */
?>

<div class="large-4 columns entry">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

		<div class="featured-image">

			<?php // Featured Image
			if ( has_post_thumbnail() ) { 
				echo '<a href="' . esc_url( get_permalink() ) . '">';
				the_post_thumbnail( 'post-image' );
			} // end featured image ?>
			
				<header class="entry-header">
					<?php the_title( sprintf( '<div class="entry-title">', esc_url( get_permalink() ) ), '</div>' ); ?>

					<div class="entry-date">
						<?php the_field( 'diadiem' ); ?>
					</div><!-- .entry-date -->

					<div class="entry-date">
						Khởi công: 
						<?php echo DateTime::createFromFormat('Ymd', get_field( 'ngaykhoicong' ))->format('m/Y'); ?>
					</div><!-- .entry-date -->

				</header><!-- .entry-header -->
			</a>
		</div><!-- .featured-image -->

	</article><!-- #post-## -->

</div><!-- .large-4 -->