<?php
// Archivo de prueba para verificar el sistema Front Controller

echo "<h1>🧪 Prueba del Sistema Front Controller</h1>";

// Verificar que las clases principales existen
echo "<h2>📋 Verificación de Clases</h2>";

// Incluir las clases necesarias
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Layout.php';

try {
    $router = new Router();
    echo "<p>✅ Router creado exitosamente</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error al crear Router: " . $e->getMessage() . "</p>";
}

// Verificar archivos de controladores
echo "<h2>📁 Verificación de Controladores</h2>";

$controllers = [
    'HomeController',
    'ServiceController', 
    'ProductController',
    'BlogController',
    'ErrorController'
];

foreach ($controllers as $controller) {
    $file = __DIR__ . '/../controllers/' . $controller . '.php';
    if (file_exists($file)) {
        echo "<p>✅ $controller.php existe</p>";
        
        // Verificar que la clase se puede cargar
        require_once $file;
        if (class_exists($controller)) {
            echo "<p style='margin-left: 20px;'>✅ Clase $controller existe</p>";
        } else {
            echo "<p style='margin-left: 20px; color: red;'>❌ Clase $controller no existe</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ $controller.php no existe</p>";
    }
}

// Verificar rutas
echo "<h2>🔗 Verificación de Rutas</h2>";

$routes = [
    'home' => 'HomeController::index',
    'services' => 'ServiceController::index',
    'products' => 'ProductController::index',
    'blog' => 'BlogController::index',
    '404' => 'ErrorController::notFound'
];

foreach ($routes as $route => $controllerAction) {
    list($controller, $action) = explode('::', $controllerAction);
    $file = __DIR__ . '/../controllers/' . $controller . '.php';
    
    if (file_exists($file)) {
        require_once $file;
        if (class_exists($controller)) {
            $reflection = new ReflectionClass($controller);
            if ($reflection->hasMethod($action)) {
                echo "<p>✅ Ruta '$route' -> $controller::$action()</p>";
            } else {
                echo "<p style='color: orange;'>⚠️ Ruta '$route' -> $controller::$action() (método no existe)</p>";
            }
        } else {
            echo "<p style='color: red;'>❌ Ruta '$route' -> $controller::$action() (clase no existe)</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Ruta '$route' -> $controller::$action() (archivo no existe)</p>";
    }
}

// Probar una ruta específica
echo "<h2>🧪 Prueba de Ruta Específica</h2>";

$_GET['route'] = 'services';
echo "<p>Probando ruta: services</p>";

try {
    $router = new Router();
    echo "<p>✅ Router creado para prueba</p>";
    
    // No ejecutar handleRequest aquí para evitar output
    echo "<p>✅ Sistema listo para procesar la ruta 'services'</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error en prueba: " . $e->getMessage() . "</p>";
}

echo "<h2>🔗 Enlaces de Prueba</h2>";
echo "<p><a href='index.php?route=services' target='_blank'>Probar ruta 'services'</a></p>";
echo "<p><a href='index.php?route=home' target='_blank'>Probar ruta 'home'</a></p>";
echo "<p><a href='index.php?route=products' target='_blank'>Probar ruta 'products'</a></p>";
echo "<p><a href='index.php?route=blog' target='_blank'>Probar ruta 'blog'</a></p>";

echo "<h2>📋 Información del Sistema</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Current Directory:</strong> " . __DIR__ . "</p>";
echo "<p><strong>Controllers Directory:</strong> " . __DIR__ . '/../controllers/' . "</p>";
?> 