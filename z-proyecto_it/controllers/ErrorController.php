<?php
// ErrorController: Controlador para manejar errores y páginas no encontradas

class ErrorController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    // Página 404 - No encontrada
    public function notFound() {
        $this->layout->setTitle('Página no encontrada - Mi Sitio Web');
        $this->layout->setMetaDescription('La página que buscas no existe.');
        
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
    
    // Página de error general
    public function general() {
        $this->layout->setTitle('Error - Mi Sitio Web');
        $this->layout->setMetaDescription('Ha ocurrido un error en el sitio web.');
        
        $this->layout->render('error', [
            'errorCode' => '500',
            'errorTitle' => 'Error del servidor',
            'errorMessage' => 'Ha ocurrido un error interno. Por favor, intenta de nuevo más tarde.',
            'suggestions' => [
                'Recarga la página',
                'Limpia el caché del navegador',
                'Contacta con soporte técnico si el problema persiste'
            ]
        ]);
    }
} 