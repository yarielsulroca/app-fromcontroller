<?php
require_once __DIR__ . '/../models/Producto.php';
class ProductoController {
    private $layout;
    private Producto $_producto;
    private $_productos_ultimos;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->_producto = new Producto;

        $this->_productos_ultimos = $this->_producto->getByCategoria("Mac");
    }
    
    public function index() {
        $this->layout->setTitle('ComercioIT | Productos');
        $this->layout->setMetaDescription('Nuestros productos.');
        
        $this->layout->render('productos', [
            'pageTitle' => 'Productos',
            'productos_ultimos' => $this->_productos_ultimos,
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
                "id" => $id,
                "nombre" => "Lorem ipsum dolor #$id",
                "descrip" => "Descripción del producto $id",
                "precio" => $id.'00',
                "imagen" => "productos/P00$id.jpg",
                "stock" => $id.'50',
            ],
            
        ]);
    }
    

} 