<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Service.php';

class HomeController {
    private $layout;
    private $userModel;
    private $productModel;
    private $serviceModel;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->serviceModel = new Service();
    }
    
    // SOLO página de inicio/dashboard
    public function index() {
        $this->layout->setTitle('Inicio - Mi Sitio Web');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        
        // Obtener datos dinámicos para el dashboard
        $totalUsers = $this->userModel->count();
        $totalProducts = $this->productModel->count();
        $totalServices = $this->serviceModel->count();
        $recentProducts = $this->productModel->getInStock();
        $featuredServices = $this->serviceModel->getOrderedByPrice('ASC');
        
        $this->layout->render('home', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'heroTitle' => 'Soluciones Innovadoras',
            'heroSubtitle' => 'Descubre cómo podemos ayudarte a alcanzar tus objetivos',
            'stats' => [
                'users' => $totalUsers,
                'products' => $totalProducts,
                'services' => $totalServices
            ],
            'recentProducts' => array_slice($recentProducts, 0, 3),
            'featuredServices' => array_slice($featuredServices, 0, 3),
            'features' => [
                [
                    'icon' => 'fas fa-rocket',
                    'title' => 'Rápido y Eficiente',
                    'description' => 'Nuestras soluciones están optimizadas para máxima velocidad y eficiencia.'
                ],
                [
                    'icon' => 'fas fa-shield-alt',
                    'title' => 'Seguro y Confiable',
                    'description' => 'Tu seguridad es nuestra prioridad. Implementamos las mejores prácticas.'
                ],
                [
                    'icon' => 'fas fa-users',
                    'title' => 'Soporte 24/7',
                    'description' => 'Nuestro equipo está disponible para ayudarte en cualquier momento.'
                ]
            ]
        ]);
    }
}