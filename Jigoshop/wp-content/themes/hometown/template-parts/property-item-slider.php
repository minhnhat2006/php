<?php

$post_id = get_the_ID();

$image_ids = preg_split('/,/', get_post_meta( $post_id, '_listing_images_id', true ), -1, PREG_SPLIT_NO_EMPTY);

?>

<div class="property-hero">
	<div class="carousel-wrap">
		<div class="lt-carousel lt-carousel-single property-carousel property-carousel-5a0969a4bc4d3 owl-carousel owl-theme owl-loaded" data-items="1" data-dots="false" data-auto-height="true" data-single-item="true" data-autoplay="true" data-autoplay-timeout="4000" data-autoplay-hover-pause="true" data-nav="true" data-loop="true" data-nav-thumb=".property-thumb-nav-5a0969a4bc4d3">
			<div class="owl-stage-outer owl-height" style="height: 455px;">
				<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0.25s; width: <?php echo 683*sizeof($image_ids); ?>px;">
					<?php
					foreach ($image_ids as $idx => $image_id) {
						$image = wp_get_attachment_image_src($image_id, 'large');
						if ( $image ) {
							list($src, , ) = $image;
						}
						if ($idx == 0) {
					?>
					<div class="owl-item active" style="width: 683px; margin-right: 0px;">
						<div class="item">
							<a class="swipebox" rel="5a0969a4bc4d3" href="<?php echo $src; ?>">
								<img src='<?php echo $src; ?>' />
								<!-- <i class="flaticon-play43 overlay-icon"></i> -->
							</a>
						</div>
					</div>
					<?php
					} else {
					?>
					<div class="owl-item" style="width: 683px; margin-right: 0px;">
						<div class="item">
							<a class="swipebox" rel="5a0969a4bc4d3" href="<?php echo $src; ?>">
								<img src='<?php echo $src; ?>' />
							</a>
						</div>
					</div>
					<?php
						}
				 	}
					?>
				</div>
			</div>
			<div class="owl-controls">
				<div class="owl-nav">
					<div class="owl-prev" style="">
						<i class="flaticon-arrow395">
						</i>
					</div>
					<div class="owl-next" style="">
						<i class="flaticon-move13">
						</i>
					</div>
				</div>
				<div class="owl-dots" style="display: none;">
				</div>
			</div>
		</div>
		<div class="badge">
			<div class="status">
				<ul class="meta-list">
					<li>
						<?php
						$category = reset(get_the_category())->name;
						?>
						<a href="https://demo.leafthemes.com/hometown-1/property-status/for-rent/" rel="tag"><?php echo $category; ?></a>
					</li>
				</ul>
			</div>
			<div class="price">$<span><?php echo number_format(get_field('price')); ?><?php if ($category == 'For Rent') : ?></span>
				<small>/month</small><?php endif; ?>
			</div>
		</div>
	</div>
	<a href="#" class="add-wish-list " data-property-id="160">
		<span class="lt-icon flaticon-favorite21">
		</span>
	</a>
</div>

<ul class="property-thumb-nav-5a0969a4bc4d3 thumb-nav large-block-grid-8 medium-block-grid-7 small-block-grid-4 clearfix" data-nav-thumb=".property-carousel-5a0969a4bc4d3">
	<?php
	foreach ($image_ids as $idx => $image_id) {
		$image_src = wp_get_attachment_image( $image_id );
		if ($idx == 0) {
	?>
	<li class="active">
		<?php echo $image_src; ?>
		<!-- <i class="flaticon-play43 overlay-icon"></i> -->
	</li>
	<?php
		} else {
	?>
	<li>
		<?php echo $image_src; ?>
	</li>
	<?php
		}
 	}
	?>
</ul>