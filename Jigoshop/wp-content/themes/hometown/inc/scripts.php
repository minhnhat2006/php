<?php
/**
 * Enqueue scripts and styles.
 */
function hometown_custom_scripts() {
	wp_enqueue_style( 'hometown-lt-google-webfont-css', '//fonts.googleapis.com/css?family=Raleway%3A400%2C300&#038;ver=2.6.0' );
	wp_enqueue_style( 'hometown-breeze_03bd941c4663b7dadb010bcdced1605a.css', get_theme_file_uri( '/assets/css/breeze_03bd941c4663b7dadb010bcdced1605a.css' ));

	wp_enqueue_script( 'hometown-maps.googleapis.com.js', '//maps.googleapis.com/maps/api/js?v=3.exp&#038;sensor=false&#038;libraries=places&#038;key=AIzaSyCBybfWlOOpsXx05tU1amB9kSIV3ijZ5PE&#038;ver=2.6.0', array(), false, true );
	wp_enqueue_script( 'hometown-jquery.js', get_theme_file_uri( '/assets/js/jquery.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-jquery-migrate.min.js', get_theme_file_uri( '/assets/js/jquery-migrate.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-jquery.form.min.js', get_theme_file_uri( '/assets/js/jquery.form.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-jquery.ui.touch-punch.js', get_theme_file_uri( '/assets/js/jquery.ui.touch-punch.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-widget.min.js', get_theme_file_uri( '/assets/js/widget.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-mouse.min.js', get_theme_file_uri( '/assets/js/mouse.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-pack-min.js', get_theme_file_uri( '/assets/js/pack-min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-slider.min.js', get_theme_file_uri( '/assets/js/slider.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-iris.min.js', get_theme_file_uri( '/assets/js/iris.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-core.min.js', get_theme_file_uri( '/assets/js/core.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-jssocials.min.js', get_theme_file_uri( '/assets/js/jssocials.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-draggable.min.js', get_theme_file_uri( '/assets/js/draggable.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-scripts.js', get_theme_file_uri( '/assets/js/scripts.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-theme.js', get_theme_file_uri( '/assets/js/theme.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-waypoints.min.js', get_theme_file_uri( '/assets/js/waypoints.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-wp-embed.min.js', get_theme_file_uri( '/assets/js/wp-embed.min.js' ), array(), false, true );
	wp_enqueue_script( 'hometown-wp-emoji-release.min.js', get_theme_file_uri( '/assets/js/wp-emoji-release.min.js' ), array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'hometown_custom_scripts' );


function hometown_admin_scripts() {
	wp_enqueue_script( 'hometown-admin-images-gallery', get_theme_file_uri( '/assets/js/image_gallery.js' ), array(), false, true );
}
add_action( 'admin_enqueue_scripts', 'hometown_admin_scripts' );