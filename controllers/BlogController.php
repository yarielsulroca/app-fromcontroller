<?php
class BlogController {

    private $layout;
    
    public function __construct($layout) {
        $this->layout = $layout;
    }

    public function index() {
        $this->layout->setTitle('Blog');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        $this->layout->render('blog', [
            'pageTitle' => 'Blog'
        ]);
    }
    public function show() {
        $this->layout->setTitle('Blog Post');
        $this->layout->setMetaDescription('Bienvenido a nuestro sitio web. Descubre nuestros servicios y productos.');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        $this->layout->render('blog-post', [
            'pageTitle' => 'Blog Post'
        ]);
    }
}