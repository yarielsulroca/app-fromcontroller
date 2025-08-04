<?php

require_once __DIR__ . '/../controllers/ContactController.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/IngresoController.php';
require_once __DIR__ . '/../controllers/ProductController.php';
require_once __DIR__ . '/../controllers/RegistroController.php';

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

        // Verificar si la ruta existe
        if (isset($routes[$route])) {
            $this->handleRoute($routes[$route]);
        } else {
            $this->showError('Ruta no encontrada: ' . $route);
        }
    }

    private function handleRoute($routeConfig)
    {
        // echo 'HANDLE ROUTE PARA ' . $routeConfig['controller'] . '<br>';
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