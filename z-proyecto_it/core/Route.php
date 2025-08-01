<?php

class Route {

    private $layout;

    //Constructor
    public function __construct()
    {
        $this->layout = new Layout();
    }

    //Handle request para manejar los pedidos de ruta
    public function handleRequest(){
        $route = isset($_GET['route']) ? $_GET['route'] : 'home';

        $routes = [
            'home' => ['controller' => 'HomeController','action' => 'index'],
            'ingreso' => ['controller' => 'IngresoController','action' => 'index'],
            'registro' => ['controller' => 'RegistroController','action' => 'index'],
            'contact' => ['controller' => 'ContactController','action' => 'index'],
        ];
    }

    private function handleRoute($routeConfig)
    {
        $controllerName = $routeConfig['controller'];
        $actionName = $routeConfig['action'];
        $controller = new $controllerName($this->layout);
        $controller->$actionName();
    }
}

?>