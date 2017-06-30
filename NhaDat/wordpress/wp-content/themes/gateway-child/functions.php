<?php

function gateway_enqueue_parent_theme_style() {
    wp_enqueue_style( 'gateway-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'gateway-style' );
    wp_enqueue_style( 'gateway-child-style', get_stylesheet_directory_uri().'/style.css' );
    wp_enqueue_style( 'gateway-child-style-header', get_stylesheet_directory_uri().'/css/header.css' );
    wp_enqueue_style( 'gateway-child-style-icon', get_stylesheet_directory_uri().'/css/icon.css' );
    wp_enqueue_style( 'gateway-child-style-font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.css' );
    wp_enqueue_style( 'gateway-child-style-single-post', get_stylesheet_directory_uri().'/css/single.css' );
}
add_action( 'wp_enqueue_scripts', 'gateway_enqueue_parent_theme_style', 99 );

function create_sale_post() {
	register_post_type( 'sale-post',
		array(
			'labels' => array(
				'name' => __( 'Nhà đất bán' ),
				'singular_name' => __( 'Nhà đất bán' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

function create_lease_post() {
	register_post_type( 'lease-post',
		array(
			'labels' => array(
				'name' => __( 'Nhà đất cho thuê' ),
				'singular_name' => __( 'Nhà đất cho thuê' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

function create_project_post() {
	register_post_type( 'project-post',
		array(
			'labels' => array(
				'name' => __( 'Dự án mới' ),
				'singular_name' => __( 'Dự án mới' ),
			),
			'public' => true,
			'has_archive' => false,
			'hierarchical' => true,
			#'rewrite' => array('slug' => 'project'),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

function create_news_post() {
	register_post_type( 'news-post',
		array(
			'labels' => array(
				'name' => __( 'Thông tin thị trường' ),
				'singular_name' => __( 'Thông tin thị trường' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

function create_building_post() {
	register_post_type( 'building-post',
		array(
			'labels' => array(
				'name' => __( 'Tòa nhà nổi bật' ),
				'singular_name' => __( 'Tòa nhà nổi bật' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

function create_resident_post() {
	register_post_type( 'resident-post',
		array(
			'labels' => array(
				'name' => __( 'Khu dân cư' ),
				'singular_name' => __( 'Khu dân cư' ),
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields'
			)
	));
}

add_action( 'init', 'create_sale_post' );
add_action( 'init', 'create_lease_post' );
add_action( 'init', 'create_project_post' );
add_action( 'init', 'create_news_post' );
add_action( 'init', 'create_building_post' );
add_action( 'init', 'create_resident_post' );

function custom_pagination($numpages = '', $pagerange = '', $paged='') {
  if (empty($pagerange)) {
    $pagerange = 5;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination entry-detail'>";
      echo $paginate_links;
    echo "</nav>";
  }

}