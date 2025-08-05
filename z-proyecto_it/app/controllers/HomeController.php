<?php
// HomeController: Controlador principal para las páginas básicas del sitio

class HomeController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    // Página de inicio
    public function index() {
        $this->layout->setTitle('ComercioIT | Tu E-Shop en PHP');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        
        $this->layout->render('home', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'productos_destacados' => [
                [
                    "id" => 1,
                    "nombre" => "Lorem ipsum dolor #1",
                    "precio" => 100,
                    "imagen" => "productos/P001.jpg",
                ],
                [
                    "id" => 2,
                    "nombre" => "Lorem ipsum dolor #2",
                    "precio" => 200,
                    "imagen" => "productos/P002.jpg",
                ],
                [
                    "id" => 3,
                    "nombre" => "Lorem ipsum dolor #3",
                    "precio" => 300,
                    "imagen" => "productos/P003.jpg",
                ],
            ],
            'productos_ultimos' => [
                [
                    "id" => 4,
                    "nombre" => "Lorem ipsum dolor #4",
                    "precio" => 400,
                    "imagen" => "productos/P004.jpg",
                ],
                [
                    "id" => 5,
                    "nombre" => "Lorem ipsum dolor #5",
                    "precio" => 500,
                    "imagen" => "productos/P005.jpg",
                ],
                [
                    "id" => 6,
                    "nombre" => "Lorem ipsum dolor #6",
                    "precio" => 600,
                    "imagen" => "productos/P006.jpg",
                ],
            ],
        ]);
    }
    

} 