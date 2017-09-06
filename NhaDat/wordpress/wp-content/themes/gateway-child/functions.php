<?php

global $show_admin_bar;
$show_admin_bar=false;

function gateway_enqueue_parent_theme_style() {
    wp_enqueue_style( 'gateway-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'gateway-style' );
    wp_enqueue_style( 'gateway-child-style-flaticon-multimedia', get_stylesheet_directory_uri().'/include/fontflat/multimedia/flaticon.css' );
    wp_enqueue_style( 'gateway-child-style-flaticon', get_stylesheet_directory_uri().'/css/flaticon.css' );
    wp_enqueue_style( 'gateway-child-style-jquery-ui', get_stylesheet_directory_uri().'/include/jquery-ui-themes-1.11.4/themes/smoothness/jquery-ui.min.css');
    wp_enqueue_style( 'gateway-child-style', get_stylesheet_directory_uri().'/style.css' );
    wp_enqueue_style( 'gateway-child-style-header', get_stylesheet_directory_uri().'/css/header.css' );
    wp_enqueue_style( 'gateway-child-style-header-post', get_stylesheet_directory_uri().'/css/header-post.css' );
    // wp_enqueue_style( 'gateway-child-style-font-awesome', get_stylesheet_directory_uri().'/include/font-awesome-4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'gateway-child-style-search', get_stylesheet_directory_uri().'/css/search.css' );
    wp_enqueue_style( 'gateway-child-style-single-house', get_stylesheet_directory_uri().'/css/single-house.css' );
    wp_enqueue_style( 'gateway-child-style-profile', get_stylesheet_directory_uri().'/css/profile.css' );
    wp_enqueue_style( 'gateway-child-style-contact-us', get_stylesheet_directory_uri().'/css/contact-us.css' );
    wp_enqueue_style( 'gateway-child-style-sliderengine-amazingslider-1', get_stylesheet_directory_uri().'/include/slider/sliderengine/amazingslider-1.css' );

    wp_enqueue_script( 'gateway-child-js-jquery-ui', get_stylesheet_directory_uri().'/js/jquery-ui.min.js' );
    wp_enqueue_script( 'gateway-child-js-jquery-browser-min', get_stylesheet_directory_uri().'/js/jquery.browser.min.js' );

    wp_enqueue_script( 'gateway-child-js-home', get_stylesheet_directory_uri().'/js/home.js' );
    wp_enqueue_script( 'gateway-child-js-search', get_stylesheet_directory_uri().'/js/search.js' );
    wp_enqueue_script( 'gateway-child-js-profile', get_stylesheet_directory_uri().'/js/profile.js' );
    wp_enqueue_script( 'gateway-child-js-sliderengine-amazingslider', get_stylesheet_directory_uri().'/include/slider/sliderengine/amazingslider.js' );
    wp_enqueue_script( 'gateway-child-js-sliderengine-initslider-1', get_stylesheet_directory_uri().'/include/slider/sliderengine/initslider-1.js' );
}
add_action( 'wp_enqueue_scripts', 'gateway_enqueue_parent_theme_style', 99 );

function create_house_post() {
	register_post_type( 'house-post',
		array(
			'labels' => array(
				'name' => __( 'House' ),
				'singular_name' => __( 'House' ),
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

function create_apartment_post() {
	register_post_type( 'apartment-post',
		array(
			'labels' => array(
				'name' => __( 'Căn hộ' ),
				'singular_name' => __( 'Căn hộ' ),
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

function create_villa_post() {
	register_post_type( 'villa-post',
		array(
			'labels' => array(
				'name' => __( 'Biệt thự' ),
				'singular_name' => __( 'Biệt thự' ),
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

add_action( 'init', 'create_house_post' );
add_action( 'init', 'create_apartment_post' );
add_action( 'init', 'create_villa_post' );

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

//Create extra fields called Altnative Text and Custom Classess
function my_extra_gallery_fields( $args, $attachment_id, $field ){
    $args['alt'] = array('type' => 'text', 'label' => 'Altnative Text', 'name' => 'alt', 'value' => get_field($field . '_alt', $attachment_id) ); // Creates Altnative Text field
    $args['class'] = array('type' => 'text', 'label' => 'Custom Classess', 'name' => 'class', 'value' => get_field($field . '_class', $attachment_id) ); // Creates Custom Classess field
    return $args;
}
add_filter( 'acf_photo_gallery_image_fields', 'my_extra_gallery_fields', 10, 3 );

// Include several features
require 'include/filter.php';
require 'include/profile.php';
require 'include/contact-us.php';
require 'include/login_form_modal.php';