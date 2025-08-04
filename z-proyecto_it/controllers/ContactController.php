<?php

class ContactController {
    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }

    // Método para manejar la solicitud de la página "Acerca de"
  public function index(){
    $this->layout->setTitle('Contacto');
    $this->layout->setMetaDescription('Contacto controller');
    $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
    //$this->layout->addScript('<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>');

    $this->layout->render('contact', [
      'pageTitle' => 'Bienvenido a Contacto',
      'heroTitle' => 'Workshop',
      ]);
    }

}

?>