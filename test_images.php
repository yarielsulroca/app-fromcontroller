<?php
// Script para verificar productos e imágenes
require_once 'config/database.php';
require_once 'models/BaseModel.php';
require_once 'models/Product.php';

echo "<h2>Verificación de Productos e Imágenes</h2>";

try {
    $productModel = new Product();
    
    // Obtener todos los productos
    $products = $productModel->all();
    
    echo "<h3>Productos en la base de datos:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Imagen (DB)</th><th>Ruta Completa</th><th>Existe Archivo</th></tr>";
    
    foreach ($products as $product) {
        $imagePath = $product['image'];
        $fullPath = __DIR__ . '/public/' . $imagePath;
        $fileExists = file_exists($fullPath) ? '✅ Sí' : '❌ No';
        
        echo "<tr>";
        echo "<td>{$product['id']}</td>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$imagePath}</td>";
        echo "<td>{$fullPath}</td>";
        echo "<td>{$fileExists}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    // Verificar archivos en la carpeta
    echo "<h3>Archivos en public/uploads/products/:</h3>";
    $uploadDir = __DIR__ . '/public/uploads/products/';
    $files = scandir($uploadDir);
    
    echo "<ul>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<li>{$file}</li>";
        }
    }
    echo "</ul>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 