<?php
// Front Controller: Punto de entrada único para todas las peticiones
// Maneja el enrutamiento y carga el layout principal
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/Layout.php';


// Iniciar sesión si es necesario
session_start();

// Debug: Mostrar información de la petición
echo "<!-- Debug: Petición recibida -->\n";
echo "<!-- URL: " . $_SERVER['REQUEST_URI'] . " -->\n";
echo "<!-- Route parameter: " . (isset($_GET['route']) ? $_GET['route'] : 'no definido') . " -->\n";

$route = new Route();
$route->handleRequest();
?>