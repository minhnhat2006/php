<?php

/**
* The following function will strip the script name from URL i.e.  http://localhost/entry/list will become /entry/list
*/
function getCurrentUri() {
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

    if (strstr($uri, '?')) {
        $uri = substr($uri, 0, strpos($uri, '?'));
    }

    $uri = '/' . trim($uri, '/');

    return $uri;
}

function parseCurrentUri() {
    $base_url = getCurrentUri();
    $paths = array();
    $routes = array();
    $routes = explode('/', $base_url);

    foreach($routes as $route) {
        if (trim($route) != '') {
            array_push($paths, $route);
        }
    }

    return $paths;
}