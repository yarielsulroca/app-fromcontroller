<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $layout;
    private $productModel;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->productModel = new Product();
    }
    
    // Listar productos (página pública)
    public function index() {
        $this->layout->setTitle('Productos - Mi Sitio Web');
        $this->layout->setMetaDescription('Descubre nuestra gama de productos innovadores y soluciones tecnológicas.');
        
        // Obtener categoría del filtro
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        
        // Filtrar productos por categoría si se especifica
        if ($category) {
            $products = $this->productModel->getByCategory($category);
        } else {
            $products = $this->productModel->all();
        }
        
        $categories = $this->productModel->getCategories();
        
        $this->layout->render('products', [
            'pageTitle' => 'Nuestros Productos',
            'heroTitle' => 'Productos Innovadores',
            'heroSubtitle' => 'Soluciones tecnológicas de vanguardia',
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category // Para marcar la categoría activa
        ]);
    }
    
    // Detalle de producto (página pública)
    public function detail($id = null) {
        if (!$id) {
            header('Location: ?route=products');
            exit;
        }
        
        $product = $this->productModel->find($id);
        
        if (!$product) {
            header('Location: ?route=products');
            exit;
        }
        
        $this->layout->setTitle($product['name'] . ' - Mi Sitio Web');
        $this->layout->setMetaDescription($product['description']);
        
        $this->layout->render('products/detail', [
            'product' => $product
        ]);
    }
    
    // ADMIN: Listar productos (panel de administración)
    public function admin() {
        $this->layout->setTitle('Administrar Productos - Panel de Control');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $products = $this->productModel->paginate($page, 10);
        
        $this->layout->render('admin/products/index', [
            'pageTitle' => 'Administrar Productos',
            'products' => $products
        ]);
    }
    
    // ADMIN: Mostrar formulario de creación
    public function create() {
        $this->layout->setTitle('Crear Producto - Panel de Control');
        
        $categories = $this->productModel->getCategories();
        
        $this->layout->render('admin/products/create', [
            'pageTitle' => 'Crear Nuevo Producto',
            'categories' => $categories
        ]);
    }
    
    // ADMIN: Guardar nuevo producto
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=products-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateProduct($_POST);
        
        // Manejo de imagen
        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->uploadImage($_FILES['image']);
            if (!$imagePath) {
                $errors['image'] = 'Error al subir la imagen. Verifica el formato y tamaño.';
            }
        }
        
        if (!empty($errors)) {
            $categories = $this->productModel->getCategories();
            $this->layout->render('admin/products/create', [
                'pageTitle' => 'Crear Nuevo Producto',
                'errors' => $errors,
                'old' => $_POST,
                'categories' => $categories
            ]);
            return;
        }
        
        // Agregar ruta de imagen a los datos
        if ($imagePath) {
            $_POST['image'] = $imagePath;
        }
        
        try {
            $productId = $this->productModel->create($_POST);
            
            $_SESSION['success'] = 'Producto creado exitosamente.';
            header('Location: ?route=products-admin');
            exit;
            
        } catch (Exception $e) {
            $categories = $this->productModel->getCategories();
            $this->layout->render('admin/products/create', [
                'pageTitle' => 'Crear Nuevo Producto',
                'errors' => ['general' => 'Error al crear producto: ' . $e->getMessage()],
                'old' => $_POST,
                'categories' => $categories
            ]);
        }
    }
    
    // ADMIN: Mostrar formulario de edición
    public function edit($id) {
        $this->layout->setTitle('Editar Producto - Panel de Control');
        
        $product = $this->productModel->find($id);
        
        if (!$product) {
            $_SESSION['error'] = 'Producto no encontrado.';
            header('Location: ?route=products-admin');
            exit;
        }
        
        $categories = $this->productModel->getCategories();
        
        $this->layout->render('admin/products/edit', [
            'pageTitle' => 'Editar Producto',
            'product' => $product,
            'categories' => $categories
        ]);
    }
    
    // ADMIN: Actualizar producto
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=products-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateProduct($_POST, $id);
        
        // Manejo de imagen
        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->uploadImage($_FILES['image']);
            if (!$imagePath) {
                $errors['image'] = 'Error al subir la imagen. Verifica el formato y tamaño.';
            }
        }
        
        if (!empty($errors)) {
            $product = $this->productModel->find($id);
            $categories = $this->productModel->getCategories();
            $this->layout->render('admin/products/edit', [
                'pageTitle' => 'Editar Producto',
                'product' => $product,
                'errors' => $errors,
                'old' => $_POST,
                'categories' => $categories
            ]);
            return;
        }
        
        // Agregar ruta de imagen a los datos si se subió una nueva
        if ($imagePath) {
            $_POST['image'] = $imagePath;
        }
        
        try {
            $this->productModel->update($id, $_POST);
            
            $_SESSION['success'] = 'Producto actualizado exitosamente.';
            header('Location: ?route=products-admin');
            exit;
            
        } catch (Exception $e) {
            $product = $this->productModel->find($id);
            $categories = $this->productModel->getCategories();
            $this->layout->render('admin/products/edit', [
                'pageTitle' => 'Editar Producto',
                'product' => $product,
                'errors' => ['general' => 'Error al actualizar producto: ' . $e->getMessage()],
                'old' => $_POST,
                'categories' => $categories
            ]);
        }
    }
    
    // ADMIN: Eliminar producto
    public function delete($id) {
        try {
            $this->productModel->delete($id);
            $_SESSION['success'] = 'Producto eliminado exitosamente.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al eliminar producto: ' . $e->getMessage();
        }
        
        header('Location: ?route=products-admin');
        exit;
    }
    
    // Validación de datos
    private function validateProduct($data, $id = null) {
        $errors = [];
        
        // Validar nombre
        if (empty($data['name'])) {
            $errors['name'] = 'El nombre es requerido.';
        } elseif (strlen($data['name']) < 3) {
            $errors['name'] = 'El nombre debe tener al menos 3 caracteres.';
        }
        
        // Validar descripción
        if (empty($data['description'])) {
            $errors['description'] = 'La descripción es requerida.';
        }
        
        // Validar precio
        if (empty($data['price'])) {
            $errors['price'] = 'El precio es requerido.';
        } elseif (!is_numeric($data['price']) || $data['price'] <= 0) {
            $errors['price'] = 'El precio debe ser un número válido mayor a 0.';
        }
        
        // Validar stock
        if (!isset($data['stock'])) {
            $errors['stock'] = 'El stock es requerido.';
        } elseif (!is_numeric($data['stock']) || $data['stock'] < 0) {
            $errors['stock'] = 'El stock debe ser un número válido mayor o igual a 0.';
        }
        
        // Validar categoría
        if (empty($data['category'])) {
            $errors['category'] = 'La categoría es requerida.';
        }
        
        return $errors;
    }
    
    // Método para subir imagen
    private function uploadImage($file) {
        $uploadDir = __DIR__ . '/../public/uploads/products/';
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 5 * 1024 * 1024; // 5MB
        
        // Crear directorio si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Validar tipo
        if (!in_array($file['type'], $allowedTypes)) {
            return false;
        }
        
        // Validar tamaño
        if ($file['size'] > $maxSize) {
            return false;
        }
        
        // Generar nombre único
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Mover archivo
        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            return 'uploads/products/' . $filename;
        }
        
        return false;
    }
}