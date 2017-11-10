<li>
	<div class="card" style="height: 349px;">
		<div class="img-wrap">
			<a href="<?php echo get_permalink(); ?>"><img class="attachment-card size-card wp-post-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="675" height="375"></a>
			<div class="badge">
				<div class="status">
					<ul class="meta-list">
						<li>
							<a href="http://demo.leafthemes.com/hometown-1/property-status/for-sale/" rel="tag">
							<?php
							$category = reset(get_the_category())->name;
							echo $category;
							?>
							</a>
						</li>
					</ul>
				</div>
				<div class="price">$<?php echo number_format(get_field('price')); ?><?php if ($category == 'For Rent') : ?> <small>/month</small><?php endif; ?></div>
			</div>
		</div>
		<div class="content-wrap">
			<div class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
			<ul class="meta-list">
				<?php
				$location = get_field('location');
				if(!empty($location)) {
					$addresses = preg_split('/,/', $location['address'], -1, PREG_SPLIT_NO_EMPTY);
					foreach ($addresses as $idx => $address) {
						if ($idx == sizeof($addresses) - 1) {
							continue;
						}
					?>
						<li><a href="<?php echo site_url('/property-location/' . slugify($address)); ?>" rel="tag"><?php echo $address; ?></a></li>
					<?php
					}
				} else {
				?>
						<li><a href="<?php echo site_url('/property-location/' . slugify($address)); ?>" rel="tag">&nbsp;</a></li>
				<?php
				}
				?>
			</ul>
			<ul class="meta-box-list">
				<li>
					<i class="lt-icon flaticon-display6"></i> <?php echo get_field('area'); ?> ft<sup>2</sup>
				</li>
				<li class="right">
					<i class="lt-icon flaticon-person1 big"></i> <?php echo get_field('bedrooms'); ?> 
					<i class="lt-icon flaticon-shower5"></i> <?php echo get_field('bathrooms'); ?>
					<i class="lt-icon flaticon-car95"></i> <?php echo get_field('garage'); ?>
				</li>
			</ul>
		</div>
	</div>
</li>