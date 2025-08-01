<?php
// HomeController: Controlador principal para las páginas básicas del sitio

class HomeController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    // Página de inicio
    public function index() {
        $this->layout->setTitle('Inicio - Mi Sitio Web');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        
        // Agregar estilos específicos para la página de inicio
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        
        $this->layout->render('home', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'heroTitle' => 'Soluciones Innovadoras',
            'heroSubtitle' => 'Descubre cómo podemos ayudarte a alcanzar tus objetivos',
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
    
    // Página Acerca de
    public function about() {
        $this->layout->setTitle('Acerca de - Mi Sitio Web');
        $this->layout->setMetaDescription('Conoce más sobre nuestra empresa, misión, visión y valores.');
        
        $this->layout->render('about', [
            'pageTitle' => 'Acerca de Nosotros',
            'companyInfo' => [
                'name' => 'Mi Empresa S.A.',
                'founded' => '2020',
                'employees' => '50+',
                'clients' => '200+'
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
    
    // Página de Contacto
    public function contact() {
        $this->layout->setTitle('Contacto - Mi Sitio Web');
        $this->layout->setMetaDescription('Contáctanos para obtener más información sobre nuestros servicios.');
        
        // Agregar script específico para validación del formulario de contacto
        $this->layout->addScript('<script src="assets/js/contact.js"></script>');
        
        $this->layout->render('contact', [
            'pageTitle' => 'Contáctanos',
            'contactInfo' => [
                'email' => 'info@misitioweb.com',
                'phone' => '+1 234 567 890',
                'address' => 'Calle Principal 123, Ciudad, País',
                'hours' => 'Lunes a Viernes: 9:00 AM - 6:00 PM'
            ]
        ]);
    }
} 