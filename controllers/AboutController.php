<?php

class AboutController {

 private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index(){
        $this->layout->setTitle('Acerca de');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');


        $this->layout->render('about', [
            'pageTitle' => 'Acerca de nosotros',
            'heroTitle' => 'Sobre nosotros',
          
        ]);
    }

}



?>