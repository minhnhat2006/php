<?php
/**
 * The template used for displaying content in template-search.php
 */
?>

<div class="large-4 entry-search">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

		<div class="search-entry-image">

			<?php // Featured Image
			if ( has_post_thumbnail() ) { 
				echo '<a href="' . esc_url( get_permalink() ) . '">';
				the_post_thumbnail( 'post-image' );
			} // end featured image ?>
			</a>

			<div class="search-entry-price">
				<?php echo number_format (get_field( 'gia' ), 0, ',', '.'); ?><small>/tháng&nbsp;</small>
			</div>
		</div><!-- .search-image -->

		<div class="search-entry-content">

			<div class="search-entry-title">
				<?php the_title(); ?>
			</div>

			<div class="search-entry-location">
				<?php the_field( 'diadiem' ); ?>
			</div>

			<div class="entry-size">
				<ul>
					<li class="float-left"><i class="lt-icon flaticon-display6"></i>&nbsp;<?php the_field( 'dientich' ); ?> m<sup>2</sup></li>
					<li class="float-right">
						<i class="lt-icon flaticon-person1 big"></i>&nbsp;<?php the_field( 'socan' ); ?>
						<i class="lt-icon flaticon-shower5"></i>&nbsp;<?php the_field( 'socan' ); ?>
						<i class="lt-icon flaticon-car95"></i>&nbsp;<?php the_field( 'socan' ); ?>
					</li>
				</ul>
			</div>

			<div class="entry-size entry-action">
				<ul>
					<li class="float-left">
						<div class="entry-avatar" style="background-image:url('http://sydney.wpresidence.net/wp-content/uploads/2014/05/agent4-1-14-120x120.jpg');"></div>
						<a href="http://sydney.wpresidence.net/agents/maria-barlow/">Maria Barlow</a>
					</li>
					<li class="float-right">
						<i class="lt-icon flaticon-share icon-action"></i>
						<?php the_favorites_button(); ?>
					</li>
				</ul>
			</div>

		</div><!-- .featured-image -->

	</article><!-- #post-## -->

</div><!-- .large-4 -->