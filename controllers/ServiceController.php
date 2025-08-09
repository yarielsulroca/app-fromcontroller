<?php
// ServiceController: Controlador para gestionar servicios
// Demuestra el uso del patrón Front Controller con sistema de layouts
require_once __DIR__ . '/../models/Service.php';

class ServiceController {
    private $layout;
    private Service $service;

    public function __construct($layout) {
        $this->layout = $layout;
        $this->service = new Service;
    }
    
    // Listar servicios (página pública)
    public function index() {
        $this->layout->setTitle('Servicios - Mi Sitio Web');
        $this->layout->setMetaDescription('Descubre nuestros servicios profesionales. Ofrecemos soluciones innovadoras para tu negocio.');
        
        $services = $this->service->all();
        $categories = $this->service->getCategories();
        
        $this->layout->render('services', [
            'pageTitle' => 'Nuestros Servicios',
            'heroTitle' => 'Servicios Profesionales',
            'heroSubtitle' => 'Soluciones integrales para tu negocio',
            'services' => [
                $this->service->getServices()
            ],
            'testimonials' => [
                [
                    'name' => 'María González',
                    'position' => 'CEO, TechStart',
                    'text' => 'Excelente trabajo en nuestro proyecto. El equipo fue muy profesional y entregó más de lo esperado.',
                    'rating' => 5
                ],
                [
                    'name' => 'Carlos Rodríguez',
                    'position' => 'Director de IT, InnovCorp',
                    'text' => 'La implementación fue perfecta y el soporte post-venta es excepcional. Altamente recomendados.',
                    'rating' => 5
                ]
            ]
        ]);
    }
    
    // Detalle de servicio (página pública)
    public function detail($id = null) {
        if (!$id) {
            header('Location: ?route=services');
            exit;
        }
        
        $service = $this->service->find($id);
        
        if (!$service) {
            header('Location: ?route=services');
            exit;
        }
        
        $this->layout->setTitle($service['name'] . ' - Mi Sitio Web');
        $this->layout->setMetaDescription($service['description']);
        
        $this->layout->render('services/detail', [
            'service' => $service
        ]);
    }
    
    // ADMIN: Listar servicios (panel de administración)
    public function admin() {
        $this->layout->setTitle('Administrar Servicios - Panel de Control');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $services = $this->service->paginate($page, 10);
        
        $this->layout->render('admin/services/index', [
            'pageTitle' => 'Administrar Servicios',
            'services' => $services
        ]);
    }
    
    // ADMIN: Mostrar formulario de creación
    public function create() {
        $this->layout->setTitle('Crear Servicio - Panel de Control');
        
        $categories = $this->service->getCategories();
        
        $this->layout->render('admin/services/create', [
            'pageTitle' => 'Crear Nuevo Servicio',
            'categories' => $categories
        ]);
    }
    
    // ADMIN: Guardar nuevo servicio
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=services-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateService($_POST);
        
        if (!empty($errors)) {
            $categories = $this->service->getCategories();
            $this->layout->render('admin/services/create', [
                'pageTitle' => 'Crear Nuevo Servicio',
                'errors' => $errors,
                'old' => $_POST,
                'categories' => $categories
            ]);
            return;
        }
        
        try {
            $serviceId = $this->service->create($_POST);
            
            $_SESSION['success'] = 'Servicio creado exitosamente.';
            header('Location: ?route=services-admin');
            exit;
            
        } catch (Exception $e) {
            $categories = $this->service->getCategories();
            $this->layout->render('admin/services/create', [
                'pageTitle' => 'Crear Nuevo Servicio',
                'errors' => ['general' => 'Error al crear servicio: ' . $e->getMessage()],
                'old' => $_POST,
                'categories' => $categories
            ]);
        }
    }
    
    // ADMIN: Mostrar formulario de edición
    public function edit($id) {
        $this->layout->setTitle('Editar Servicio - Panel de Control');
        
        $service = $this->service->find($id);
        
        if (!$service) {
            $_SESSION['error'] = 'Servicio no encontrado.';
            header('Location: ?route=services-admin');
            exit;
        }
        
        $categories = $this->service->getCategories();
        
        $this->layout->render('admin/services/edit', [
            'pageTitle' => 'Editar Servicio',
            'service' => $service,
            'categories' => $categories
        ]);
    }
    
    // ADMIN: Actualizar servicio
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=services-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateService($_POST, $id);
        
        if (!empty($errors)) {
            $service = $this->service->find($id);
            $categories = $this->service->getCategories();
            $this->layout->render('admin/services/edit', [
                'pageTitle' => 'Editar Servicio',
                'service' => $service,
                'errors' => $errors,
                'old' => $_POST,
                'categories' => $categories
            ]);
            return;
        }
        
        try {
            $this->service->update($id, $_POST);
            
            $_SESSION['success'] = 'Servicio actualizado exitosamente.';
            header('Location: ?route=services-admin');
            exit;
            
        } catch (Exception $e) {
            $service = $this->service->find($id);
            $categories = $this->service->getCategories();
            $this->layout->render('admin/services/edit', [
                'pageTitle' => 'Editar Servicio',
                'service' => $service,
                'errors' => ['general' => 'Error al actualizar servicio: ' . $e->getMessage()],
                'old' => $_POST,
                'categories' => $categories
            ]);
        }
    }
    
    // ADMIN: Eliminar servicio
    public function delete($id) {
        try {
            $this->service->delete($id);
            $_SESSION['success'] = 'Servicio eliminado exitosamente.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al eliminar servicio: ' . $e->getMessage();
        }
        
        header('Location: ?route=services-admin');
        exit;
    }
    
    // Validación de datos
    private function validateService($data, $id = null) {
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
        
        // Validar duración
        if (!empty($data['duration']) && (!is_numeric($data['duration']) || $data['duration'] <= 0)) {
            $errors['duration'] = 'La duración debe ser un número válido mayor a 0.';
        }
        
        // Validar categoría
        if (empty($data['category'])) {
            $errors['category'] = 'La categoría es requerida.';
        }
        
        return $errors;
    }
}