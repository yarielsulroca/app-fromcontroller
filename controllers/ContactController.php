<?php
class ContactController {
    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }
    public function index() {
        $this->layout->setTitle('Contactos');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        $this->layout->render('contact', ['pageTitle' => 'Contacto',
        'contactInfo' =>[
            'email' => 'correo@correo.com',
            'phone' => '+54 911 100 200 300',
            'address' => 'la direccion',
            'hours' => 'De 8 a 20 hs'
        ]
        
        ]);
       

    }
}