<?php
class BlogController
{
   private $layout;

   public function __construct($layout) {
      $this->layout = $layout;
   }

   // Método para manejar la solicitud de la página "Acerca de"
   public function index(){
      $this->layout->setTitle('Blog');
      $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
      $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
      //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');
      $this->layout->render('blog', [
         'pageTitle' => 'Bienvenido a Blog',
         'heroTitle' => 'Soluciones Innovadoras',
      ]);
   }

   public function show(){
      echo "Estoy en el BlogController show";
   }
}
?>