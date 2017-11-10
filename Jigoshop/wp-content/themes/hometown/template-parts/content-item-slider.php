<div class="row item" data-id="<?php echo get_the_ID(); ?>">
	<div class="columns large-12" style="position:relative;">
		<div class="hero-card">
			<div class="card-head">
				<div class="card-title">
					<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?> <i class="flaticon-next15"></i>
					</a>
				</div>
			</div>
			<div class="card-body">
				<p><?php echo get_the_excerpt(); ?></p>
			</div>
			<div class="card-bottom clearfix">
				<div class="card-meta">
					<i class="lt-icon flaticon-person1 big"></i> <?php echo get_field('bedrooms'); ?> 
					<i class="lt-icon flaticon-shower5"></i> <?php echo get_field('bathrooms'); ?> 
					<i class="lt-icon flaticon-car95"></i> <?php echo get_field('garage'); ?>
				</div>
				<div class="card-price">$<span><?php echo number_format(get_field('price')); ?></span><small>/month</small>
				</div>
			</div>
		</div>
	</div>
</div>