<?php 
namespace Core;

use Core\Middleware\Middleware;

class Router {
    protected array $routes = [];
    protected string $base_path = "";

    protected function add($uri, $controller, $method) {
        $this->routes[] = [
            "uri" => $this->base_path . $uri,
            "controller" => $controller,
            "method" => $method,
            "requiredPermission" => null
        ];
        return $this;
    }

    public function get($uri, $controller) {
        return $this->add(uri:$uri, controller:$controller, method:"GET");
    }

    public function post($uri, $controller) {
        return $this->add(uri:$uri, controller:$controller, method:"POST");
    }

    public function delete($uri, $controller) {
        return $this->add(uri:$uri, controller:$controller, method:"DELETE");
    }

    public function put($uri, $controller) {
        return $this->add(uri:$uri, controller:$controller, method:"PUT");
    }

    public function patch($uri, $controller) {
        return $this->add(uri:$uri, controller:$controller, method:"PATCH");
    }

    public function only(string $permission) {
        $lastIndex = array_key_last($this->routes);
        $this->routes[$lastIndex]["requiredPermission"] = $permission;
        return $this;
    }

    protected function notFound() {
        http_response_code(404);
        require base_path("views/404.view.php");
        die();
    }

    public function matchRoutes($uri, $method) {
        foreach($this->routes as $route) {
            if($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                Middleware::resolve($route["requiredPermission"]);
                return require base_path("Http/controllers/{$route['controller']}");
            }
        }
        $this->notFound();
    }
    
}
// $definedRoutes = require base_path("routes.php");


// class Router {
//     protected  string $base_path = "/laracast";
//     protected array $routes = []; 

//     public function __construct($routes)
//     {
//         $this->routes = $this->routeWithBase($routes);
//     }

//     protected function routeWithBase($routes) {
//         return array_combine(
//             array_map(fn($url) => $this->base_path . $url, array_keys($routes)),
//             array_values($routes)
//         );
//     }


//     public function matchRoutes() {
//         $url = parse_url($_SERVER["REQUEST_URI"])["path"];

//         if (array_key_exists($url, $this->routes)) {
//             require base_path($this->routes[$url]);
//         } else {
//             notFound();
//         }
//     }

// }

// $router = new Router($definedRoutes);
// $router->matchRoutes();