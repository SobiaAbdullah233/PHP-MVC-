<?php


spl_autoload_register(function ($name) {
    $name = str_replace('\\', '/', $name).".php";
    require_once($name);
});

require_once("routes.php");
$route = array_filter($routes, function($item) {
    return $_SERVER['REQUEST_URI'] == $item['path'];
});

if(empty($route)) {
    echo "404 Page not found";
    die;
}
$route = array_values($route);
$route = $route[0];

require_once('helpers.php');

$controller_name = "Controllers\\{$route['controller']}Controller";
$controller = new $controller_name();
$controller->{$route['action']}();
