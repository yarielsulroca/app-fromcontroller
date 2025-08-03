<?php

class ProductoController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index() {
        $this->layout->setTitle('ComercioIT | Productos');
        $this->layout->setMetaDescription('Nuestros productos.');
        
        $this->layout->render('productos', [
            'pageTitle' => 'Productos',
            'productos_ultimos' => [
                [
                    "id" => 4,
                    "nombre" => "Lorem ipsum dolor #4",
                    "descrip" => "Descripción 4",
                    "precio" => 400,
                    "imagen" => "productos/P004.jpg",
                ],
                [
                    "id" => 5,
                    "nombre" => "Lorem ipsum dolor #5",
                    "descrip" => "Descripción 5",
                    "precio" => 500,
                    "imagen" => "productos/P005.jpg",
                ],
                [
                    "id" => 6,
                    "nombre" => "Lorem ipsum dolor #6",
                    "descrip" => "Descripción 6",
                    "precio" => 600,
                    "imagen" => "productos/P006.jpg",
                ],
            ],
            
            
        ]);
    }

    public function detalle() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        // Mostrar un error o ir a 404, pero ¡NO redirigir de nuevo!
        echo "ID de producto inválido.";
        return;
        }

        $id = $_GET['id'];

        $this->layout->setTitle('ComercioIT | Producto');
        $this->layout->setMetaDescription('Producto.');
        
        $this->layout->render('producto', [
            'pageTitle' => 'Producto',
            "producto" => [
                "producto_id" => $id,
                "nombre" => "Lorem ipsum dolor #$id",
                "descrip" => "Descripción del producto $id",
                "precio" => $id.'00',
                "imagen" => "productos/P00$id.jpg",
                "stock" => $id.'50',
            ],
            
        ]);
    }
    

} 