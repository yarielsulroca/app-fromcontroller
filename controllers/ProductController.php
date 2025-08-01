<?php
// ProductController: Controlador para gestionar productos
// Demuestra el uso del patrón Front Controller con sistema de layouts

class ProductController {
    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }

    public function index() {
        $this->layout->setTitle('Productos - Mi Sitio Web');
        $this->layout->setMetaDescription('Descubre nuestra gama de productos innovadores y soluciones tecnológicas.');
        
        $this->layout->render('products', [
            'pageTitle' => 'Nuestros Productos',
            'heroTitle' => 'Productos Innovadores',
            'heroSubtitle' => 'Soluciones tecnológicas de vanguardia',
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Sistema de Gestión Empresarial',
                    'description' => 'Plataforma completa para la gestión integral de tu empresa.',
                    'price' => '$999',
                    'category' => 'Software',
                    'features' => ['Gestión de inventarios', 'Facturación automática', 'Reportes en tiempo real', 'Múltiples usuarios'],
                    'image' => 'fas fa-laptop'
                ],
                [
                    'id' => 2,
                    'name' => 'Aplicación Móvil Personalizada',
                    'description' => 'Desarrollo de aplicaciones móviles a medida para tu negocio.',
                    'price' => '$1,499',
                    'category' => 'Desarrollo',
                    'features' => ['iOS y Android', 'Diseño personalizado', 'Integración con APIs', 'Soporte técnico'],
                    'image' => 'fas fa-mobile-alt'
                ],
                [
                    'id' => 3,
                    'name' => 'Sitio Web Profesional',
                    'description' => 'Diseño y desarrollo de sitios web modernos y responsivos.',
                    'price' => '$799',
                    'category' => 'Web',
                    'features' => ['Diseño responsivo', 'SEO optimizado', 'Panel de administración', 'Hosting incluido'],
                    'image' => 'fas fa-globe'
                ],
                [
                    'id' => 4,
                    'name' => 'Consultoría Tecnológica',
                    'description' => 'Asesoramiento especializado para optimizar tu infraestructura IT.',
                    'price' => '$299/hora',
                    'category' => 'Consultoría',
                    'features' => ['Auditoría de sistemas', 'Planificación estratégica', 'Implementación', 'Seguimiento'],
                    'image' => 'fas fa-chart-line'
                ]
            ]
        ]);
    }

    public function detail($id = null) {
        if (!$id) {
            header('Location: ?route=products');
            exit;
        }

        $this->layout->setTitle('Detalle del Producto - Mi Sitio Web');
        $this->layout->setMetaDescription('Información detallada sobre nuestros productos.');
        
        $this->layout->render('products/detail', [
            'productId' => $id,
            'pageTitle' => 'Detalle del Producto',
            'product' => [
                'id' => $id,
                'name' => 'Producto ' . $id,
                'description' => 'Descripción detallada del producto seleccionado.',
                'price' => '$999',
                'category' => 'Categoría',
                'features' => ['Característica 1', 'Característica 2', 'Característica 3'],
                'specifications' => [
                    'Tecnología' => 'PHP, MySQL, JavaScript',
                    'Compatibilidad' => 'Todos los navegadores',
                    'Soporte' => '24/7',
                    'Garantía' => '1 año'
                ]
            ]
        ]);
    }
} 