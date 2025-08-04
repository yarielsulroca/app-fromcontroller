<?php
class ContactController
{
    
     private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index(){
        $this->layout->setTitle('Contact - Mi Sitio Web');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');


        $this->layout->render('contact', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'heroTitle' => 'Soluciones Innovadoras',
          
        ]);
    }
   
}