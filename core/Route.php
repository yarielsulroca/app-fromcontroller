<?php

require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/AboutController.php';

class Route
{
    private $layout;

    public function __construct()
    {
        $this->layout = new Layout();
    }
//fin del constructor


//inicio del metodo handleRequest
    public function handleRequest()
    {
        $route = isset($_GET['route']) ? $_GET['route'] : 'home';
        // Mapear rutas a controladores y acciones
        $routes = [
            'home' => ['controller' => 'HomeController', 'action' => 'index'],
            'about' =>['controller' =>'AboutController','action'=>'index'],
            'contact' => ['controller' => '', 'action' => ''],
            'products' => ['controller' => '', 'action' => ''],
            'product-detail' => ['controller' => '', 'action' => ''],
            'services' => ['controller' => '', 'action' => ''],
            'blog' => ['controller' => '', 'action' => ''],
            '404' => ['controller' => 'errorController', 'action' => '']
        ];

        // Verificar si la ruta existe
        if (isset($routes[$route])) {
            $this->handleRoute($routes[$route]);
        } else {
            $this->showError('Ruta no encontrada: ' . $route);
        }
    }

    private function handleRoute($routeConfig)
    {
        $controllerName = $routeConfig['controller'];
        $actionName = $routeConfig['action'];
        $controller = new $controllerName();
        $controller->$actionName(); 
    }

    private function showError($message)
    {
        $this->layout->render('error', [
            'errorCode' => '500',
            'errorTitle' => 'Error del Sistema',
            'errorMessage' => $message,
        ]);
    }
}
?>