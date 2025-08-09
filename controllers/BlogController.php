<?php
require_once __DIR__ . '/../models/BlogPost.php';
require_once __DIR__ . '/../models/User.php';

class BlogController {
    private $layout;
    private $blogPostModel;
    private $userModel;
    
    public function __construct($layout) {
        $this->layout = $layout;
        $this->blogPostModel = new BlogPost();
        $this->userModel = new User();
    }
    
    // Listar posts del blog (página pública)
    public function index() {
        $this->layout->setTitle('Blog - Mi Sitio Web');
        $this->layout->setMetaDescription('Artículos y noticias sobre tecnología, desarrollo web y tendencias del sector.');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = $this->blogPostModel->paginate($page, 6);
        
        $this->layout->render('blog', [
            'pageTitle' => 'Nuestro Blog',
            'heroTitle' => 'Blog Tecnológico',
            'heroSubtitle' => 'Artículos, tutoriales y noticias del mundo tech',
            'posts' => $posts
        ]);
    }
    
    // Detalle de post del blog (página pública)
    public function post($id = null) {
        if (!$id) {
            header('Location: ?route=blog');
            exit;
        }
        
        $post = $this->blogPostModel->find($id);
        
        if (!$post || $post['status'] !== 'published') {
            header('Location: ?route=blog');
            exit;
        }
        
        // Obtener información del autor
        $author = null;
        if ($post['author_id']) {
            $author = $this->userModel->find($post['author_id']);
        }
        
        $this->layout->setTitle($post['title'] . ' - Blog');
        $this->layout->setMetaDescription($post['excerpt']);
        
        $this->layout->render('blog/post', [
            'post' => $post,
            'author' => $author
        ]);
    }
    
    // ADMIN: Listar posts del blog (panel de administración)
    public function admin() {
        $this->layout->setTitle('Administrar Blog - Panel de Control');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $posts = $this->blogPostModel->paginate($page, 10);
        
        $this->layout->render('admin/blog/index', [
            'pageTitle' => 'Administrar Blog',
            'posts' => $posts
        ]);
    }
    
    // ADMIN: Mostrar formulario de creación
    public function create() {
        $this->layout->setTitle('Crear Post - Panel de Control');
        
        $authors = $this->userModel->getAdmins();
        
        $this->layout->render('admin/blog/create', [
            'pageTitle' => 'Crear Nuevo Post',
            'authors' => $authors
        ]);
    }
    
    // ADMIN: Guardar nuevo post
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=blog-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateBlogPost($_POST);
        
        if (!empty($errors)) {
            $authors = $this->userModel->getAdmins();
            $this->layout->render('admin/blog/create', [
                'pageTitle' => 'Crear Nuevo Post',
                'errors' => $errors,
                'old' => $_POST,
                'authors' => $authors
            ]);
            return;
        }
        
        try {
            $postId = $this->blogPostModel->create($_POST);
            
            $_SESSION['success'] = 'Post creado exitosamente.';
            header('Location: ?route=blog-admin');
            exit;
            
        } catch (Exception $e) {
            $authors = $this->userModel->getAdmins();
            $this->layout->render('admin/blog/create', [
                'pageTitle' => 'Crear Nuevo Post',
                'errors' => ['general' => 'Error al crear post: ' . $e->getMessage()],
                'old' => $_POST,
                'authors' => $authors
            ]);
        }
    }
    
    // ADMIN: Mostrar formulario de edición
    public function edit($id) {
        $this->layout->setTitle('Editar Post - Panel de Control');
        
        $post = $this->blogPostModel->find($id);
        
        if (!$post) {
            $_SESSION['error'] = 'Post no encontrado.';
            header('Location: ?route=blog-admin');
            exit;
        }
        
        $authors = $this->userModel->getAdmins();
        
        $this->layout->render('admin/blog/edit', [
            'pageTitle' => 'Editar Post',
            'post' => $post,
            'authors' => $authors
        ]);
    }
    
    // ADMIN: Actualizar post
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?route=blog-admin');
            exit;
        }
        
        // Validación
        $errors = $this->validateBlogPost($_POST, $id);
        
        if (!empty($errors)) {
            $post = $this->blogPostModel->find($id);
            $authors = $this->userModel->getAdmins();
            $this->layout->render('admin/blog/edit', [
                'pageTitle' => 'Editar Post',
                'post' => $post,
                'errors' => $errors,
                'old' => $_POST,
                'authors' => $authors
            ]);
            return;
        }
        
        try {
            $this->blogPostModel->update($id, $_POST);
            
            $_SESSION['success'] = 'Post actualizado exitosamente.';
            header('Location: ?route=blog-admin');
            exit;
            
        } catch (Exception $e) {
            $post = $this->blogPostModel->find($id);
            $authors = $this->userModel->getAdmins();
            $this->layout->render('admin/blog/edit', [
                'pageTitle' => 'Editar Post',
                'post' => $post,
                'errors' => ['general' => 'Error al actualizar post: ' . $e->getMessage()],
                'old' => $_POST,
                'authors' => $authors
            ]);
        }
    }
    
    // ADMIN: Eliminar post
    public function delete($id) {
        try {
            $this->blogPostModel->delete($id);
            $_SESSION['success'] = 'Post eliminado exitosamente.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al eliminar post: ' . $e->getMessage();
        }
        
        header('Location: ?route=blog-admin');
        exit;
    }
    
    // ADMIN: Publicar post
    public function publish($id) {
        try {
            $this->blogPostModel->publish($id);
            $_SESSION['success'] = 'Post publicado exitosamente.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al publicar post: ' . $e->getMessage();
        }
        
        header('Location: ?route=blog-admin');
        exit;
    }
    
    // ADMIN: Despublicar post
    public function unpublish($id) {
        try {
            $this->blogPostModel->unpublish($id);
            $_SESSION['success'] = 'Post despublicado exitosamente.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error al despublicar post: ' . $e->getMessage();
        }
        
        header('Location: ?route=blog-admin');
        exit;
    }
    
    // Validación de datos
    private function validateBlogPost($data, $id = null) {
        $errors = [];
        
        // Validar título
        if (empty($data['title'])) {
            $errors['title'] = 'El título es requerido.';
        } elseif (strlen($data['title']) < 5) {
            $errors['title'] = 'El título debe tener al menos 5 caracteres.';
        }
        
        // Validar contenido
        if (empty($data['content'])) {
            $errors['content'] = 'El contenido es requerido.';
        } elseif (strlen($data['content']) < 50) {
            $errors['content'] = 'El contenido debe tener al menos 50 caracteres.';
        }
        
        // Validar excerpt
        if (!empty($data['excerpt']) && strlen($data['excerpt']) > 500) {
            $errors['excerpt'] = 'El extracto no puede tener más de 500 caracteres.';
        }
        
        // Validar autor
        if (!empty($data['author_id']) && !$this->userModel->find($data['author_id'])) {
            $errors['author_id'] = 'El autor seleccionado no existe.';
        }
        
        // Validar estado
        if (!empty($data['status']) && !in_array($data['status'], ['draft', 'published'])) {
            $errors['status'] = 'El estado no es válido.';
        }
        
        return $errors;
    }
}