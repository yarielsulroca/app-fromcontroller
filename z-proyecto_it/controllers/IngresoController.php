<?php
require_once __DIR__ . '/../models/User.php';
class IngresoController {
    private $layout;
    private User $_user;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->_user = new User;
    }
    
    // Página de inicio
    public function index() {
        $this->layout->setTitle('ComercioIT | Ingreso');
        $this->layout->setMetaDescription('Logueate.');
        
        $this->layout->render('ingreso', [
            'pageTitle' => 'Ingresa tus datos para entrar',
            
        ]);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=ingreso');
            exit;
        }
        
        // Validación
        $errors = $this->validateUser($_POST);

        $user = $this->_user->findByEmail($_POST['email']);

        if (!empty($errors)) {
            $this->layout->render('ingreso', [
                'pageTitle' => 'Ingreso',
                'errors' => $errors,
                'old' => $_POST,
            ]);
            return;
        }
        
        try {
            $_SESSION['id'] = $user["id"];
            $_SESSION['login'] = 'TRUE';
            $_SESSION['success'] = 'Loguearse exitosamente.';
            header('Location: ?route=ingreso');
            exit;
            
        } catch (Exception $e) {
            $this->layout->render('ingreso', [
                'pageTitle' => 'Loguearse',
                'errors' => ['general' => 'Error al loguearse producto: ' . $e->getMessage()],
                'old' => $_POST,
            ]);
        }
    }

     // Validación de datos
    private function validateUser($data, $id = null) {
        $errors = [];

        // Validar email
        if (empty($data['email'])) {
            $errors['email'] = 'El nombre es requerido.';
        } 
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $errors['email'] = 'Por favor escriba un formato viable';
        }

        if (empty($data['pass'])) {
            $errors['pass'] = 'Escriba su contraseña.';
        } 

        $user = $this->_user->findByEmail($data['email']);

        if (!is_array($user)) {
            $errors['email'] = 'No existe este mail en nuestra base de datos.';
        }
        else
        {
            if (!$this->_user->verifyPassword($data['pass'],$user["password"]) || 
                ($user["email"]!== $data['email']) )
            {
                $errors['pass'] = 'No coincide la contraseña o el email.';
            }
        } 


    
        return $errors;
    }
    

} 