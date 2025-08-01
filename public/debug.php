<?php
// Archivo de debug para verificar el estado del sistema

echo "<h1>🔍 Debug del Front Controller</h1>";

echo "<h2>📋 Información del Sistema</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p><strong>Script Name:</strong> " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "<p><strong>Request URI:</strong> " . $_SERVER['REQUEST_URI'] . "</p>";

echo "<h2>🔗 Parámetros de URL</h2>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

echo "<h2>📁 Verificación de Archivos</h2>";

$files = [
    '../core/Router.php',
    '../core/Layout.php',
    '../controllers/HomeController.php',
    '../controllers/ErrorController.php',
    '../controllers/ServiceController.php',
    '../controllers/ProductController.php',
    '../controllers/BlogController.php',
    '../views/layouts/main.php',
    '../views/home.php',
    '../views/about.php',
    '../views/contact.php',
    '../views/services.php',
    '../views/products.php',
    '../views/blog.php',
    '../views/error.php'
];

foreach ($files as $file) {
    $fullPath = __DIR__ . '/' . $file;
    $exists = file_exists($fullPath);
    $status = $exists ? "✅ Existe" : "❌ No existe";
    echo "<p><strong>$file:</strong> $status</p>";
    if (!$exists) {
        echo "<p style='color: red; margin-left: 20px;'>Ruta completa: $fullPath</p>";
    }
}

echo "<h2>🧪 Prueba de Router</h2>";

// Incluir las clases necesarias
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Layout.php';

try {
    $router = new Router();
    echo "<p>✅ Router creado exitosamente</p>";
    
    // Probar con una ruta específica
    $_GET['route'] = 'home';
    echo "<p>✅ Probando ruta: home</p>";
    
    // No ejecutar handleRequest aquí para evitar output
    echo "<p>✅ Router listo para procesar peticiones</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<h2>🔗 Enlaces de Prueba</h2>";
echo "<p><a href='index.php?route=home'>🏠 Página de Inicio</a></p>";
echo "<p><a href='index.php?route=about'>ℹ️ Acerca de</a></p>";
echo "<p><a href='index.php?route=contact'>📞 Contacto</a></p>";
echo "<p><a href='index.php?route=services'>⚙️ Servicios</a></p>";
echo "<p><a href='index.php?route=products'>🛒 Productos</a></p>";
echo "<p><a href='index.php?route=blog'>📝 Blog</a></p>";
echo "<p><a href='index.php?route=404'>🚫 Error 404</a></p>";
echo "<p><a href='index.php?route=inexistente'>🔍 Ruta Inexistente</a></p>";

echo "<h2>📋 Navegación</h2>";
echo "<p><a href='navegacion.html'>🧭 Ir a la página de navegación</a></p>";
echo "<p><a href='index.php'>🏠 Ir al Front Controller</a></p>";
?> 