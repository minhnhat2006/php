<?php
/**
 * Template Name: Property For Rent
 *
 */

get_header('project'); ?>

<div class="search-header">
	<div class="row">
		<div class="columns">
			<h1 class="page-title">Property for rent</h1>
		</div>
	</div>
</div>

<div class="search-panel">

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
			$query = new WP_Query( $args );
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