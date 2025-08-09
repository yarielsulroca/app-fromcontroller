<?php
require_once __DIR__ . '/../models/User.php';
class RegistroController {
    private $layout;
    private User $_user;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->_user = new User();
    }
    
    public function index() {
        $this->layout->setTitle('ComercioIT | Registro');
        $this->layout->setMetaDescription('Registrate.');
        
        $this->layout->render('registro', [
            'pageTitle' => 'Registrate',
            
        ]);
    }
    
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=registro');
            exit;
        }
        
        // Validación
        $errors = $this->validateUser($_POST);

        $user = $this->_user->createUser($_POST);

        if (!empty($errors)) {
            $this->layout->render('registro', [
                'pageTitle' => 'registro',
                'errors' => $errors,
                'old' => $_POST,
            ]);
            return;
        }
        
        try {
            
            $_SESSION['id'] = $user["id"];
            $_SESSION['login'] = 'TRUE';
            $_SESSION['success'] = 'registro exitosamente.';
            header('Location: ?route=registro');
            exit;
            
        } catch (Exception $e) {
            $this->layout->render('registro', [
                'pageTitle' => 'Registrar',
                'errors' => ['general' => 'Error al registrarse producto: ' . $e->getMessage()],
                'old' => $_POST,
            ]);
        }
    }

     // Validación de datos
    private function validateUser($data, $id = null) {
        $errors = [];

        // Validar email
        if (empty($data['email'])) {
            $errors['email'] = 'El mail es requerido.';
        } 
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $errors['email'] = 'Por favor escriba un formato viable';
        }

        if (empty($data['pass'])) {
            $errors['pass'] = 'Escriba su contraseña.';
        }
        elseif (strlen($data['pass']) < 8) 
        {
            $errors['pass'] = 'Por favor escriba una clave de 8 caracteres como minimo';
        } 

        if (empty($data['nombre'])) {
            $errors['nombre'] = 'Escriba su nombre.';
        }
        elseif (strlen($data['nombre']) < 2) 
        {
            $errors['nombre'] = 'Por favor escriba su apellido de 2 caracteres como minimo';
        } 

        if (empty($data['apellido'])) {
            $errors['apellido'] = 'Escriba su apellido.';
        }
        elseif (strlen($data['apellido']) < 2) 
        {
            $errors['apellido'] = 'Por favor escriba su apellido de 2 caracteres como minimo';
        } 

        $user = $this->_user->findByEmail($data['email']);

        if (is_array($user)) {
            $errors['email'] = 'Ya existe este mail en nuestra base de datos.';
        }


    
        return $errors;
    }
} 