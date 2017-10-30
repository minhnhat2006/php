<?php
/**
 * Enqueue scripts and styles.
 */
function hometown_admin_scripts() {
	wp_enqueue_script( 'hometown-admin-images-gallery', get_theme_file_uri( '/assets/js/image_gallery.js' ), array(), false, true );
}
add_action( 'admin_enqueue_scripts', 'hometown_admin_scripts' );
