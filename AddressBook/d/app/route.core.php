<?php

include 'uri.parser.php';

/**
* Check whether a controller class existed
*/
function isControllerExisted($controller) {
    $controller_path = CONTROLLER_PATH . "/{$controller}.php";
    return file_exists ($controller_path);
}

/**
* Check whether a action of controller class existed
*/
function isActionExisted($controller, $action) {
    return method_exists($controller, $action) && is_callable(array($controller, $action));
}

/**
* Remove char '-' and upper case first char of controller/action name
*/
function parseControllerActionName($name) {
    $fixed_name = '';
    $name_arr = explode('-', $name);

    foreach ($name_arr as $name_item) {
        $fixed_name .= ucfirst($name_item);
    }

    return $fixed_name;
}

/* Analyze current URI to initialize properly controller */
$paths = parseCurrentUri();
$controller = empty($paths[0]) ? DEFAULT_CONTROLLER : parseControllerActionName($paths[0]) . 'Controller'; // controller name
$action = empty($paths[1]) ? DEFAULT_ACTION : parseControllerActionName($paths[1]) . 'Action'; // action name

if (!isControllerExisted($controller) || !isActionExisted($controller, $action)) {
    $controller = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
}

/* Call action */
$routed_controller = new $controller();
call_user_func(array($routed_controller, $action));