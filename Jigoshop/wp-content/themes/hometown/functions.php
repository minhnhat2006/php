<?php

global $show_admin_bar;
$show_admin_bar = false;

define('MY_POST_TYPE', 'property');
define('MY_DOMAIN', 'localhost');
define('MY_THEME', 'hometown');
define('MY_SHORTNAME', 'ht');

require_once(get_template_directory() . '/inc/slugify.php');
require_once(get_template_directory() . '/inc/custom_posts.php');
require_once(get_template_directory() . '/inc/widgets.php');
require_once(get_template_directory() . '/inc/custom_widgets.php');
require_once(get_template_directory() . '/inc/ggapi.php');
require_once(get_template_directory() . '/inc/admin.php');
require_once(get_template_directory() . '/inc/scripts.php');
require_once(get_template_directory() . '/inc/shortcodes/properties.php');
require_once(get_template_directory() . '/inc/shortcodes/hero-slider.php');
require_once(get_template_directory() . '/inc/shortcodes/hero-slider-2.php');
require_once(get_template_directory() . '/inc/shortcodes/site-url.php');
require_once(get_template_directory() . '/inc/shortcodes/ht-menu.php');