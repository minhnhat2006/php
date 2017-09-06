<?php
/**
 * Template Name: Search
 *
 */

get_header('project'); ?>

<div class="search-header">
	<div class="row">
		<div class="columns">
			<h1 class="page-title">Tìm kiếm</h1>
		</div>
	</div>
</div>

<div class="search-panel">

	<div class="row filter-container">

		<div class="large-12 filter-labels">
			<div class="large-3 filter-label"><label for="khuvuc">Khu vực</label></div>
			<div class="large-3 filter-label"><label for="loaibds">Loại bất động sản</label></div>
			<div class="large-3 filter-label"><label for="sophongngu">Số phòng ngủ</label></div>
			<div class="large-3 filter-label"><label for="sophongtam">Số phòng tắm</label></div>
		</div>

		<div class="large-12 filter-controls">
			<div class="large-3 filter-control">
				<select name="khuvuc" id="khuvuc" value="<?php echo $_GET[ 'khuvuc' ] ?>">
			      <option value="">Bất kỳ</option>
			      <option value="Hội An">Hội An</option>
			      <option value="Đà Nẵng">Đà Nẵng</option>
			      <option value="Ngũ Hành Sơn">&nbsp&nbsp&nbsp&nbspNgũ Hành Sơn</option>
			      <option value="Sơn Trà">&nbsp&nbsp&nbsp&nbspSơn Trà</option>
			      <option value="Hải Châu">&nbsp&nbsp&nbsp&nbspHải Châu</option>
			      <option value="Thanh Khê">&nbsp&nbsp&nbsp&nbspThanh Khê</option>
			    </select>
			</div>
			<div class="large-3 filter-control">
				<select name="loaibds" id="loaibds" value="<?php echo $_GET[ 'loaibds' ] ?>">
			      <option value="">Bất kỳ</option>
			      <option value="house">Nhà</option>
			      <option value="apartment">Căn hộ</option>
			      <option value="villa">Biệt thự</option>
			    </select>
			</div>
			<div class="large-3 filter-control">
				<select name="sophongngu" id="sophongngu" value="<?php echo $_GET[ 'sophongngu' ] ?>">
			      <option value="0">Bất kỳ</option>
			      <option value="1">1+</option>
			      <option value="2">2+</option>
			      <option value="3">3+</option>
			      <option value="4">4+</option>
			      <option value="5">5+</option>
			    </select>
			</div>
			<div class="large-3 filter-control">
				<select name="sophongtam" id="sophongtam" value="<?php echo $_GET[ 'sophongtam' ] ?>">
			      <option value="0">Bất kỳ</option>
			      <option value="1">1+</option>
			      <option value="2">2+</option>
			      <option value="3">3+</option>
			      <option value="4">4+</option>
			      <option value="5">5+</option>
			    </select>
			</div>
		</div>

		<div class="large-12 filter-labels">
			<div class="large-3 filter-label">
				<label class="lbl-price">Giá tiền</label>
				<label id="amount" class="right"></label>
			</div>
			<div class="large-3 filter-label"></div>
			<div class="large-3 filter-label"></div>
			<div class="large-3 filter-label"></div>
		</div>

		<div class="large-12 filter-controls">
			<div class="large-3 filter-control">
				<div id="slider-range"></div>
			</div>
			<div class="large-3 filter-control"></div>
			<div class="large-3 filter-control"></div>
			<div class="large-3 filter-control">
				<a href="#" id="btnSearch" class="lnk-filter">Tìm kiếm</a>
			</div>
		</div>

	</div><!-- .row -->

	<div class="row sort-container">
		<select name="sort" id="sort" value="<?php echo $_GET[ 'sort' ] ?>">
	      <option value="">Sắp xếp theo</option>
	      <option value="created_date_asc">Ngày tăng dần</option>
	      <option value="created_date_desc">Ngày giảm dần</option>
	    </select>
	</div>

	<div class="row large-12 search-result">

			<?php
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
			// Get chosen category
			$home_posts_cat = esc_attr( get_theme_mod( 'home_posts_cat' ) );
			// WP_Query arguments
			$args = array (
				'post_type'         => array('house-post', 'apartment-post', 'villa-post'),
				'cat'         	    => $home_posts_cat,
				'posts_per_page'    => '15',
				'paged'				=> $paged,
			);
			// The Query
			add_action('pre_get_posts', 'filter_pre_get_posts');
			$query = new WP_Query( $args );
			remove_action('pre_get_posts', 'filter_pre_get_posts');
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); 
					get_template_part( 'template-parts/content', 'search' ); 
				}
			} else { 
				get_template_part( 'template-parts/content', 'none' ); 
			} 

			?>

	</div><!-- .row -->

<?php
	if (function_exists(custom_pagination)) {
    	custom_pagination($query->max_num_pages, "", $paged);
  	}

	// Restore original Post Data
	wp_reset_postdata(); 
?>

</div>

<script type="text/javascript">
(function($) {
	// change
	$('#btnSearch').click('click', function(){
		// vars
		var url = '<?php echo home_url('search'); ?>?';
			args = {};

		// loop over filters
		args["khuvuc"] = $('#khuvuc').find(":selected").val();
		args["loaibds"] = $('#loaibds').find(":selected").val();
		args["sophongngu"] = $('#sophongngu').find(":selected").val();
		args["sophongtam"] = $('#sophongtam').find(":selected").val();
		args["gia-min"] = $( "#slider-range" ).slider( "values", 0 );
		args["gia-max"] = $( "#slider-range" ).slider( "values", 1 );

		// loop over args
		$.each(args, function( name, value ){
			url += name + '=' + value + '&';
		});

		// remove last &
		url = url.slice(0, -1);

		// reload page
		window.location.replace( url );
	});

})(jQuery);
</script>

<?php get_footer(); ?>