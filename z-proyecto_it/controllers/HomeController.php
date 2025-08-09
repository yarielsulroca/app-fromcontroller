<?php
// HomeController: Controlador principal para las páginas básicas del sitio
require_once __DIR__ . '/../models/Producto.php';

class HomeController {
    private $layout;
    private Producto $_producto;
    private  $_productos_ultimos;
    private  $_productos_destacados;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->_producto = new Producto;
    }
    
    // Página de inicio
    public function index() {
        $this->layout->setTitle('ComercioIT | Tu E-Shop en PHP');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->_productos_ultimos = $this->_producto->getByCategoria("Mac");
        $this->_productos_destacados = $this->_producto->getByCategoria("Android");

        $this->layout->render('home', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'productos_destacados' => $this->_productos_destacados,
            'productos_ultimos' => $this->_productos_ultimos,
        ]);
    }
    

} 