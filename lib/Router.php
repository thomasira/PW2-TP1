<?php
require PROJECT_ROOT . "/lib/Route.php";

class Router {
    public $routes = [];


    /**
     * ajoute une route au tableau à partir de paramètre
     * @param $path
     */
    public function addRoute($path, $params) {
        $route = new Route($path, $params);
        $this->routes[] = $route;
    }


    /**
     * 
     */
    protected function matchRoute($path) {
        foreach ($this->routes as $route) {
            if ($route->path == $path) return $route;
        }
    }


    /**
     * 
     */
    public function dispatch() {
        $uri = $_SERVER["REQUEST_URI"];
        $path = parse_url($uri)["path"];
        $pathSegments = explode("/", $path);
		$slug = end($pathSegments);
        $currentRoute = $this->matchRoute($path);
        if ($currentRoute) {
            $currentRoute->params["slug"] = $slug;
            require PROJECT_ROOT . "/app/controllers/" . $currentRoute->params["controller"] . ".php";
            $controllerName = $currentRoute->params["controller"] . "Controller";
            $actionName = $currentRoute->params["action"] . "Action";
            $controller = new $controllerName($currentRoute->params);
            $controller->$actionName();
        } else echo "404";
    } 
}
