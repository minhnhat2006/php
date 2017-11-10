<?php
/*
 Shortcode: hero-slider
*/

 function hero_slider($params) {

 	$options = get_option( 'pickup_properties' );
 	$pickedup_properties = preg_split('/,/',  $options['pickup'], -1, PREG_SPLIT_NO_EMPTY);

 	if (empty($pickedup_properties)) {
 		return;
 	}

	ob_start();
 	?>

 	<div class="hero" style="height: 500px;">
 		<div class="bg-wrap">
 			<?php
 			foreach ($pickedup_properties as $idx => $property) {
 				if ($idx == 0) {
 			?>
	 			<div class="item active" style="background-image: url('<?php echo get_the_post_thumbnail_url($property); ?>');">
	 			</div>
 			<?php
 				} else {
 			?>
 				<div class="item" style="background-image: url('<?php echo get_the_post_thumbnail_url($property); ?>'); ?>');">
	 			</div>
	 		<?php
		 		}
		 	}
	 		?>
 		</div>

 		<div class="lt-carousel lt-carousel-single full-width" data-items="1" data-single-item="true" data-smart-speed="500" data-bg=".bg-wrap" data-autoplay="true" data-autoplay-timeout="5000" data-autoplay-hover-pause="true" data-loop="true" data-nav="true" data-dots="false">
 			<?php

 			foreach ($pickedup_properties as $property) {
 				global $post;
 				$post = get_post($property);
 				setup_postdata( $post );
				include( get_template_directory() . '/template-parts/content-item-slider.php');
 			}
 			?>
 		</div>
 	</div>

<?php
	$output = ob_get_contents();
	ob_end_clean();

	wp_reset_postdata();

	return $output;
}

add_shortcode( 'hero-slider', 'hero_slider' );