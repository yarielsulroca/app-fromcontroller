<?php

class RegistroController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index() {
        $this->layout->setTitle('ComercioIT | Registro');
        $this->layout->setMetaDescription('Registrate.');
        
        $this->layout->render('registro', [
            'pageTitle' => 'Registrate',
            
        ]);
    }
    

} 