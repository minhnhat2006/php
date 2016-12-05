<?php

// error reporting on
error_reporting(E_ALL);

// define the site path constant
$site_path = realpath(dirname(__FILE__));
define ('SITE_PATH', $site_path);
define ('CONTROLLER_PATH', $site_path . '/controller');
define ('MODEL_PATH', $site_path . '/model');
define ('VIEW_PATH', $site_path . '/view');
define ('UTIL_PATH', $site_path . '/helper');
define ('BASE_URL', implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/');

include 'app/include.php';
include 'app/route.php';