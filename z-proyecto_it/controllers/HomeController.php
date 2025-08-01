<?php
class HomeController
{
    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }

    public function index(){
        $this->layout->setTitle('Inicio - Workshop PHP');
        $this->layout->setMetaDescription('Bienvenido al workshop de PHP avanzado.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');

        $this->layout->render('home', [
            'pageTitle' => 'Bienvenido al Worshop',
            'heroTitle' => 'PHP Avanzado',
            'heroSubtitle' => 'Aprende PHP avanzado',
            'features' => [
                // [
                //     'icon' => 'fas fa-rocket',
                //     'title' => 'Rápido y Eficiente',
                //     'description' => 'Nuestras soluciones están optimizadas para máxima velocidad y eficiencia.'                ],
                // [
                //     'icon' => 'fas fa-shield-alt',
                //     'title' => 'Seguro y Confiable',
                //     'description' => 'Tu seguridad es nuestra prioridad. Implementamos las mejores prácticas'
                // ],
                // [
                //     'icon' => 'fas fa-users',
                //     'title' => 'Soporte 24/7',
                //     'description' => 'Nuestro equipo está disponible para ayudarte en cualquier momento.'
                // ]

            ]
        ]);
    }
}
?>