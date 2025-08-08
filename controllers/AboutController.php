<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Service.php';

class AboutController {
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
    
    public function index() {
        $this->layout->setTitle('Acerca de - Mi Sitio Web');
        $this->layout->setMetaDescription('Conoce más sobre nuestra empresa, misión, visión y valores.');
        
        // Obtener estadísticas reales
        $totalUsers = $this->userModel->count();
        $totalProducts = $this->productModel->count();
        $totalServices = $this->serviceModel->count();
        
        $this->layout->render('about', [
            'pageTitle' => 'Acerca de Nosotros',
            'companyInfo' => [
                'name' => 'Mi Empresa S.A.',
                'founded' => '2020',
                'employees' => '50+',
                'clients' => $totalUsers,
                'products' => $totalProducts,
                'services' => $totalServices
            ],
            'mission' => 'Proporcionar soluciones tecnológicas innovadoras que impulsen el crecimiento de nuestros clientes.',
            'vision' => 'Ser líderes en el desarrollo de soluciones digitales que transformen la manera de hacer negocios.',
            'values' => [
                'Innovación',
                'Calidad',
                'Integridad',
                'Colaboración',
                'Excelencia'
            ]
        ]);
    }
}