<?php
class BlogController
{
    
   private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    
    public function index(){
        $this->layout->setTitle('Blog - Mi Sitio Web');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');


        $this->layout->render('blog', [
            'pageTitle' => 'Bienvenido a Nuestro Sitio',
            'heroTitle' => 'Soluciones Innovadoras',
          
        ]);
    }

     public function show(){
      $this->layout->setTitle('Blog Post - Mi Sitio Web');
      $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
      $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');

      $this->layout->render('blog-post', [
         'pageTitle' => 'Bienvenido a Nuestro Sitio',
         'heroTitle' => 'Soluciones Innovadoras',
         
      ]);
    }
   
}