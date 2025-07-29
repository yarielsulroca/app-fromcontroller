<?php
// Layout: Plantilla madre reutilizable para todas las vistas
// Maneja la estructura HTML común y permite inyectar contenido específico

class Layout {
   public function render($view, $data = []) {
    extract($data);
    include __DIR__ . '/../views/' . $view . '.php';
   }
} 