<?php
// ServiceController: Controlador para gestionar servicios
// Demuestra el uso del patrón Front Controller con sistema de layouts

class ServiceController {
    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }

    public function index() {
        $this->layout->setTitle('Servicios - Mi Sitio Web');
        $this->layout->setMetaDescription('Descubre nuestros servicios profesionales. Ofrecemos soluciones innovadoras para tu negocio.');
        
        $this->layout->render('services', [
            'pageTitle' => 'Nuestros Servicios',
            'heroTitle' => 'Servicios Profesionales',
            'heroSubtitle' => 'Soluciones integrales para tu negocio',
            'services' => [
                [
                    'icon' => 'fas fa-code',
                    'title' => 'Desarrollo Web',
                    'description' => 'Creamos sitios web modernos y responsivos con las últimas tecnologías.',
                    'features' => ['HTML5 & CSS3', 'JavaScript ES6+', 'PHP & MySQL', 'Frameworks modernos']
                ],
                [
                    'icon' => 'fas fa-mobile-alt',
                    'title' => 'Aplicaciones Móviles',
                    'description' => 'Desarrollamos aplicaciones móviles nativas y multiplataforma.',
                    'features' => ['iOS & Android', 'React Native', 'Flutter', 'PWA']
                ],
                [
                    'icon' => 'fas fa-database',
                    'title' => 'Bases de Datos',
                    'description' => 'Diseño y optimización de bases de datos para tu aplicación.',
                    'features' => ['MySQL & PostgreSQL', 'MongoDB', 'Redis', 'Optimización']
                ],
                [
                    'icon' => 'fas fa-cloud',
                    'title' => 'Cloud Computing',
                    'description' => 'Implementamos soluciones en la nube para escalabilidad.',
                    'features' => ['AWS & Azure', 'Docker', 'Kubernetes', 'CI/CD']
                ],
                [
                    'icon' => 'fas fa-shield-alt',
                    'title' => 'Ciberseguridad',
                    'description' => 'Protegemos tu aplicación con las mejores prácticas de seguridad.',
                    'features' => ['Auditorías de seguridad', 'SSL/TLS', 'OWASP', 'Backup']
                ],
                [
                    'icon' => 'fas fa-chart-line',
                    'title' => 'Análisis de Datos',
                    'description' => 'Extraemos insights valiosos de tus datos para tomar mejores decisiones.',
                    'features' => ['Big Data', 'Machine Learning', 'Visualización', 'Reportes']
                ]
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