<?php

class IngresoController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    // Página de inicio
    public function index() {
        $this->layout->setTitle('ComercioIT | Ingreso');
        $this->layout->setMetaDescription('Logueate.');
        
        $this->layout->render('ingreso', [
            'pageTitle' => 'Ingresa tus datos para entrar',
            
        ]);
    }
    

} 