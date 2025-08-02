<?php
// Router: Encargado de analizar la URL y delegar la petición al controlador adecuado

class Router {
    private $layout;
    
    public function __construct() {
        $this->layout = new Layout();
    }
    
    public function handleRequest() {
        // Obtener la ruta desde la URL
        $route = isset($_GET['route']) ? $_GET['route'] : 'home';
        
        // Mapear rutas a controladores y acciones
        $routes = [
            'home' => ['controller' => 'HomeController', 'action' => 'index'],
            'contacto' => ['controller' => 'ContactoController', 'action' => 'index'],
            'ingreso' => ['controller' => 'IngresoController', 'action' => 'index'],
            '404' => ['controller' => 'ErrorController', 'action' => 'notFound']
        ];
        
        // Verificar si la ruta existe
        if (!isset($routes[$route])) {
            $route = '404';
        }
        
        $controllerName = $routes[$route]['controller'];
        $action = $routes[$route]['action'];
        
        // Construir la ruta del archivo del controlador
        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerName)) {
                $controller = new $controllerName($this->layout);
                if (method_exists($controller, $action)) {
                    // Llamar a la acción solicitada
                    $controller->$action();
                } else {
                    $this->showError("La acción '$action' no existe en el controlador '$controllerName'.");
                }
            } else {
                $this->showError("No se encontró la clase del controlador '$controllerName'.");
            }
        } else {
            $this->showError("No se encontró el archivo del controlador '$controllerName'.");
        }
    }
    
    private function showError($message) {
        $this->layout->render('error', [
            'errorCode' => '500',
            'errorTitle' => 'Error del Sistema',
            'errorMessage' => $message,
            'suggestions' => [
                'Verifica que la URL sea correcta',
                'Usa el menú de navegación para encontrar lo que buscas',
                'Contacta con nosotros si necesitas ayuda'
            ]
        ]);
    }
} 