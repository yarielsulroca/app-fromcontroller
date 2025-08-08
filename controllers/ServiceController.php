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

    public function index() {
        $this->layout->setTitle('Servicios - Mi Sitio Web');
        $this->layout->setMetaDescription('Descubre nuestros servicios profesionales. Ofrecemos soluciones innovadoras para tu negocio.');
        
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

    public function detail($id = null) {
        if (!$id) {
            // Redirigir a la lista de servicios si no se especifica ID
            header('Location: ?route=services');
            exit;
        }

        $this->layout->setTitle('Detalle del Servicio - Mi Sitio Web');
        $this->layout->setMetaDescription('Información detallada sobre nuestros servicios profesionales.');
        
        $this->layout->render('services/detail', [
            'serviceId' => $id,
            'pageTitle' => 'Detalle del Servicio',
            'service' => [
                'id' => $id,
                'title' => 'Servicio ' . $id,
                'description' => 'Descripción detallada del servicio seleccionado.',
                'features' => ['Característica 1', 'Característica 2', 'Característica 3'],
                'pricing' => 'Consultar',
                'duration' => '2-4 semanas'
            ]
        ]);
    }
} 