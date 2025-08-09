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
        'contactInfo' => [
                'email' => 'info@misitioweb.com',
                'phone' => '+1 234 567 890',
                'address' => 'Calle Principal 123, Ciudad, País',
                'hours' => 'Lunes a Viernes: 9:00 AM - 6:00 PM'
            ]
        ]);
    }
    
    public function send() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=contact');
            exit;
        }
        
        // Validación del formulario
        $errors = $this->validateContact($_POST);
        
        if (!empty($errors)) {
            $this->layout->render('contact', [
                'pageTitle' => 'Contáctanos',
                'errors' => $errors,
                'old' => $_POST
            ]);
            return;
        }
        
        // Procesar envío (aquí iría la lógica de envío de email)
        $_SESSION['success'] = 'Mensaje enviado exitosamente. Nos pondremos en contacto contigo pronto.';
        header('Location: ?route=contact');
        exit;
    }
    
    private function validateContact($data) {
        $errors = [];
        
        if (empty($data['name'])) {
            $errors['name'] = 'El nombre es requerido.';
        }
        
        if (empty($data['email'])) {
            $errors['email'] = 'El email es requerido.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El email no es válido.';
        }
        
        if (empty($data['message'])) {
            $errors['message'] = 'El mensaje es requerido.';
        }
        
        return $errors;
    }
}