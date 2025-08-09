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

        $producto = $this->_producto->findById($id);

        $this->layout->setTitle('ComercioIT | Producto');
        $this->layout->setMetaDescription('Producto.');
        
        if(!empty($producto))
        {
            $this->layout->render('producto', [
                'pageTitle' => 'Producto',
                "producto" => $producto
                
            ]);
        }
        else 
        {
            $this->layout->render('error', [
                'errorCode' => '404',
                'errorTitle' => 'Página no encontrada',
                'errorMessage' => 'Lo sentimos, la página que buscas no existe o ha sido movida.',
                'suggestions' => [
                    'Verifica que la URL sea correcta',
                    'Usa el menú de navegación para encontrar lo que buscas',
                    'Contacta con nosotros si necesitas ayuda'
                ]
            ]);
        }
    }
    

} 