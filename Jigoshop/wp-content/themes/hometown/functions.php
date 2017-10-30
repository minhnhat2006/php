<?php

global $show_admin_bar;
$show_admin_bar = false;

define('MY_POST_TYPE', 'property');
define('MY_DOMAIN', 'localhost');
define('MY_THEME', 'hometown');
define('MY_SHORTNAME', 'ht');

require_once(get_template_directory() . '/inc/custom_posts.php');
require_once(get_template_directory() . '/inc/widgets.php');
require_once(get_template_directory() . '/inc/ggapi.php');
require_once(get_template_directory() . '/inc/admin.php');
require_once(get_template_directory() . '/inc/scripts.php');
require_once(get_template_directory() . '/inc/shortcodes/properties.php');