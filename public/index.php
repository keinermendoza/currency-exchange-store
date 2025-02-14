<?php
// namespace Fundational;
const BASE_DIR = __DIR__ . "/../";

require BASE_DIR . "vendor/autoload.php";
require BASE_DIR . "includes/Core/functions.php";

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 7);
session_start();

// spl_autoload_register(function($class) {
//     $class = str_replace('\\', '/', $class);
//     require base_path($class . ".php");
// });

require base_path("bootstrap.php");

// $router = new \Core\Router();

// using $router variable in routes.php for populate router 

$loader = new \Twig\Loader\FilesystemLoader(BASE_DIR . 'includes/views');
$twig = new \Twig\Environment($loader, [
    'cache' => 'cache', // Opcional: habilita el cache de plantillas
]);

$router =  require base_path("routes.php");



$url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$match = $router->match(requestMethod:$method);

// $router->matchRoutes($url, $method);
// $match = $router->match();

// call closure or throw 404 status
if(is_array($match)) {
    if (is_callable($match['target'])) {
        call_user_func_array( $match['target'], $match['params'] );
    } 
    else {
        $params = $match['params'];
        require base_path("Http/controllers/{$match['target']}");
    }

} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}



\Core\Session::unflash();

