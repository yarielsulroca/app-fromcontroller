<?php
// Layout: Plantilla madre reutilizable para todas las vistas
// Maneja la estructura HTML común y permite inyectar contenido específico

class Layout {
  private $title = 'Mi Sitio Web';
  private $metaDescription = 'Descripción por defecto del sitio';
  private $styles = [];
  private $scripts = [];

  public function render($view, $data = []) {
   //capturar el contenido de la vista
   ob_start();

   $this->includeView($view, $data);

   $content = ob_get_clean();

   $this->renderLayout($content, $data);


  }
  public function includeView($view, $data = []) {
   $viewFile = __DIR__ . '/../views/' . $view . '.php';

      if (file_exists($viewFile)) {
         // Extraer variables del array de datos para que estén disponibles en la vista
         extract($data);
         include $viewFile;
      } 
      else {
         echo "<div class='error'>Vista '$view' no encontrada</div>";
      }

  }

  public function renderLayout($content, $data = []) {
    // Incluir el archivo de layout principal
    include __DIR__ . '/../views/layouts/main.php';
  }
  // Métodos para configurar el layout
  public function setTitle($title) {
   $this->title = $title;
}

public function getTitle() {
   return $this->title;
}

public function setMetaDescription($description) {
   $this->metaDescription = $description;
}

public function getMetaDescription() {
   return $this->metaDescription;
}

public function addStyle($style) {
   $this->styles[] = $style;
}

public function getStyles() {
   return $this->styles;
}

public function addScript($script) {
   $this->scripts[] = $script;
}

public function getScripts() {
   return $this->scripts;
}

// Método helper para generar URLs
public function url($route) {
   return '?route=' . $route;
}

// Método helper para verificar si la ruta actual está activa
public function isActive($route) {
   $currentRoute = isset($_GET['route']) ? $_GET['route'] : 'home';
   return $currentRoute === $route ? 'active' : '';
}


}
                                                                  
 