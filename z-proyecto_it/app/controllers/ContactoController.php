<?php

class ContactoController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index() {
        $this->layout->setTitle('ComercioIT | Contacto');
        $this->layout->setMetaDescription('Contactanos.');
        
        $this->layout->render('contacto', [
            'pageTitle' => 'Contactanos',
            
        ]);
    }
    

} 