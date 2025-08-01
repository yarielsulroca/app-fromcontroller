<?php

class AboutController {
  private $layout;
    
  public function __construct($layout) {
      $this->layout = $layout;
  }
    // Método para manejar la solicitud de la página "Acerca de"
  public function index() {
    $this->layout->setTitle('Acerca de - Mi Sitio Web');
        $this->layout->setMetaDescription('Conoce más sobre nuestra empresa, misión, visión y valores.');
        
        $this->layout->render('about', [
            'pageTitle' => 'Acerca de Nosotros',
            'companyInfo' => [
                'name' => 'Mi Empresa S.A.',
                'founded' => '2020',
                'employees' => '50+',
                'clients' => '200+'
            ],
            'mission' => 'Proporcionar soluciones tecnológicas innovadoras que impulsen el crecimiento de nuestros clientes.',
            'vision' => 'Ser líderes en el desarrollo de soluciones digitales que transformen la manera de hacer negocios.',
            'values' => [
                'Innovación',
                'Calidad',
                'Integridad',
                'Colaboración',
                'Excelencia'
            ]
        ]);
    }
}



?>