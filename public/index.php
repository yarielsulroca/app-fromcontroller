<?php
// Front Controller: Punto de entrada único para todas las peticiones
// Maneja el enrutamiento y carga el layout principal

require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/Layout.php';

// Iniciar sesión si es necesario
session_start();

// Instanciar el router y procesar la petición
$router = new Route();
$router->handleRequest(); 
?>