<?php

define('FUNCTIONS_PATH', dirname(__DIR__) );


// Contains routes and corresponding functions.
$routes = [];

/**
 * Register a function on a path.
 *
 * @param $path
 * @param $file_name
 * @return array[]
 */
function registerRoute($path, $file_name) {
    global $routes;

    if (!isset($routes[$path])) {
        $routes[$path] = [
            'file_name' => $file_name
        ];
    }

    return $routes;
}

/**
 * Execute function based on its registered route.
 * @param $path
 *   Url path of the request.
 */
function executeRoute($path) {
    global $routes;

    // Check if this path is registered in the router.
    if (!isset($routes[$path])) {
        echo "No route registered for path: " . $path;
        exit(1);
    }

    $function_file = FUNCTIONS_PATH . '/' . $routes[$path]['file_name'];
    if (!file_exists($function_file)) {
//        echo "File $function_file doesn't exist.";
        echo "File ". $routes[$path]['file_name'] . " doesn't exist.";
        exit(1);
    }

    require $routes[$path]['file_name'];

//    $function = $routes[$path]['function_name'];

    // Check if function exists for this path.
//    if (!function_exists($function)) {
//        echo "No function registered for path: " . $path;
//        exit(1);
//    }

//    $function();
}
