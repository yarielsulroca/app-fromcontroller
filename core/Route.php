<?php

require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/AboutController.php';
require_once __DIR__ . '/../controllers/ContactController.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/ServiceController.php';
require_once __DIR__ . '/../controllers/ErrorController.php';
require_once __DIR__ . '/../controllers/BlogController.php';

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
            'contact' =>['controller' =>'ContactController','action'=>'index'],
            'product' =>['controller' =>'ProductController','action'=>'index'],
            'product-detail' =>['controller' =>'ProductController','action'=>'show'],
            'services' =>['controller' =>'ServiceController','action'=>'index'],
            'blog' =>['controller' =>'BlogController','action'=>'index'],
            'blog-post' =>['controller' =>'BlogController','action'=>'show'],
            '404' =>['controller' =>'ErrorController','action'=>'notFound'],
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
        $controller = new $controllerName($this->layout);
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