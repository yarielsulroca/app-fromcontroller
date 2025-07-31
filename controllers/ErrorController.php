<?php
class ErrorController {
    private $layout;

    public function __construct($layout) {
        $this->layout = $layout;
    }
    public function notFound() {
        $this->layout->setTitle('Error 404');
        $this->layout->setMetaDescription('Página no encontrada');
        $this->layout->addStyle('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">');
        $this->layout->render('error', [
            'pageTitle' => 'Error 404'
        ]);
    }
}