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
        
        // Extraer parámetros de la URL
        $params = $this->extractParams($route);
        
        // Mapear rutas a controladores y acciones
        $routes = [
            // Páginas públicas
            'home' => ['controller' => 'HomeController', 'action' => 'index', 'method' => 'GET'],
            'about' => ['controller' => 'AboutController', 'action' => 'index', 'method' => 'GET'],
            'contact' => ['controller' => 'ContactController', 'action' => 'index', 'method' => 'GET'],
            'contact-send' => ['controller' => 'ContactController', 'action' => 'send', 'method' => 'POST'],
            
            // Productos (público)
            'products' => ['controller' => 'ProductController', 'action' => 'index', 'method' => 'GET'],
            'product-detail' => ['controller' => 'ProductController', 'action' => 'detail', 'method' => 'GET'],
            
            // Servicios (público)
            'services' => ['controller' => 'ServiceController', 'action' => 'index', 'method' => 'GET'],
            'service-detail' => ['controller' => 'ServiceController', 'action' => 'detail', 'method' => 'GET'],
            
            // Blog (público)
            'blog' => ['controller' => 'BlogController', 'action' => 'index', 'method' => 'GET'],
            'blog-post' => ['controller' => 'BlogController', 'action' => 'post', 'method' => 'GET'],
            
            // Gestión de usuarios (admin)
            'users' => ['controller' => 'UserController', 'action' => 'index', 'method' => 'GET', 'auth' => true],
            'user-create' => ['controller' => 'UserController', 'action' => 'create', 'method' => 'GET', 'auth' => true],
            'user-store' => ['controller' => 'UserController', 'action' => 'store', 'method' => 'POST', 'auth' => true],
            'user-edit' => ['controller' => 'UserController', 'action' => 'edit', 'method' => 'GET', 'auth' => true],
            'user-update' => ['controller' => 'UserController', 'action' => 'update', 'method' => 'POST', 'auth' => true],
            'user-delete' => ['controller' => 'UserController', 'action' => 'delete', 'method' => 'POST', 'auth' => true],
            
            // Gestión de productos (admin)
            'products-admin' => ['controller' => 'ProductController', 'action' => 'admin', 'method' => 'GET', 'auth' => true],
            'product-create' => ['controller' => 'ProductController', 'action' => 'create', 'method' => 'GET', 'auth' => true],
            'product-store' => ['controller' => 'ProductController', 'action' => 'store', 'method' => 'POST', 'auth' => true],
            'product-edit' => ['controller' => 'ProductController', 'action' => 'edit', 'method' => 'GET', 'auth' => true],
            'product-update' => ['controller' => 'ProductController', 'action' => 'update', 'method' => 'POST', 'auth' => true],
            'product-delete' => ['controller' => 'ProductController', 'action' => 'delete', 'method' => 'POST', 'auth' => true],
            
            // Gestión de servicios (admin)
            'services-admin' => ['controller' => 'ServiceController', 'action' => 'admin', 'method' => 'GET', 'auth' => true],
            'service-create' => ['controller' => 'ServiceController', 'action' => 'create', 'method' => 'GET', 'auth' => true],
            'service-store' => ['controller' => 'ServiceController', 'action' => 'store', 'method' => 'POST', 'auth' => true],
            'service-edit' => ['controller' => 'ServiceController', 'action' => 'edit', 'method' => 'GET', 'auth' => true],
            'service-update' => ['controller' => 'ServiceController', 'action' => 'update', 'method' => 'POST', 'auth' => true],
            'service-delete' => ['controller' => 'ServiceController', 'action' => 'delete', 'method' => 'POST', 'auth' => true],
            
            // Gestión de blog (admin)
            'blog-admin' => ['controller' => 'BlogController', 'action' => 'admin', 'method' => 'GET', 'auth' => true],
            'blog-create' => ['controller' => 'BlogController', 'action' => 'create', 'method' => 'GET', 'auth' => true],
            'blog-store' => ['controller' => 'BlogController', 'action' => 'store', 'method' => 'POST', 'auth' => true],
            'blog-edit' => ['controller' => 'BlogController', 'action' => 'edit', 'method' => 'GET', 'auth' => true],
            'blog-update' => ['controller' => 'BlogController', 'action' => 'update', 'method' => 'POST', 'auth' => true],
            'blog-delete' => ['controller' => 'BlogController', 'action' => 'delete', 'method' => 'POST', 'auth' => true],
            'blog-publish' => ['controller' => 'BlogController', 'action' => 'publish', 'method' => 'POST', 'auth' => true],
            'blog-unpublish' => ['controller' => 'BlogController', 'action' => 'unpublish', 'method' => 'POST', 'auth' => true],
            
            // Errores
            '404' => ['controller' => 'ErrorController', 'action' => 'notFound', 'method' => 'GET']
        ];
        
        // Verificar si la ruta existe
        if (!isset($routes[$route])) {
            $route = '404';
        }
        
        $routeConfig = $routes[$route];
        $controllerName = $routeConfig['controller'];
        $action = $routeConfig['action'];
        $method = $routeConfig['method'] ?? 'GET';
        $requiresAuth = $routeConfig['auth'] ?? false;
        
        // Verificar método HTTP
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            $this->showError("Método HTTP no permitido. Se requiere: $method");
            return;
        }
        
        // Verificar autenticación si es requerida
        if ($requiresAuth && !$this->isAuthenticated()) {
            $this->showError("Acceso denegado. Debes iniciar sesión.");
            return;
        }
        
        // Construir la ruta del archivo del controlador
        $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerName)) {
                $controller = new $controllerName($this->layout);
                if (method_exists($controller, $action)) {
                    // Llamar a la acción solicitada con parámetros
                    $this->callAction($controller, $action, $params);
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
    
    // Extraer parámetros de la URL
    private function extractParams($route) {
        $params = [];
        
        // Extraer ID de la URL si existe
        if (isset($_GET['id'])) {
            $params['id'] = (int)$_GET['id'];
        }
        
        // Extraer otros parámetros
        foreach ($_GET as $key => $value) {
            if ($key !== 'route' && $key !== 'id') {
                $params[$key] = $value;
            }
        }
        
        return $params;
    }
    
    // Llamar a la acción del controlador con parámetros
    private function callAction($controller, $action, $params) {
        $reflection = new ReflectionMethod($controller, $action);
        $requiredParams = $reflection->getParameters();
        
        $args = [];
        foreach ($requiredParams as $param) {
            $paramName = $param->getName();
            
            if (isset($params[$paramName])) {
                $args[] = $params[$paramName];
            } elseif ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();
            } else {
                $this->showError("Parámetro requerido '$paramName' no encontrado.");
                return;
            }
        }
        
        call_user_func_array([$controller, $action], $args);
    }
    
    // Verificar si el usuario está autenticado
    private function isAuthenticated() {
        // Aquí implementarías tu lógica de autenticación
        // Por ahora, retornamos true para desarrollo
        return true;
        
        // Ejemplo de implementación real:
        // return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
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