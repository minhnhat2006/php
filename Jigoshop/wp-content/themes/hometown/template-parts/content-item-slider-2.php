<div class="row item" data-id="<?php echo get_the_ID(); ?>">
	<div class="columns large-12" style="position:relative;">
		<div class="badge">
			<div class="status">
				<ul class="meta-list">
					<li>
						<a href="<?php echo site_url('/for-rent'); ?>" rel="tag">For Rent</a>
					</li>
				</ul>
			</div>
			<div class="price">$<span><?php echo number_format(get_field('price')); ?></span> <small>/month</small>
			</div>
		</div>
		<div class="title">
			<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?> <i class="flaticon-next15"></i>
			</a>
		</div>
	</div>
</div>