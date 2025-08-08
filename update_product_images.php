<?php
// Script para actualizar rutas de imágenes de productos
require_once 'config/database.php';
require_once 'models/BaseModel.php';
require_once 'models/Product.php';

echo "<h2>Actualizando Rutas de Imágenes de Productos</h2>";

try {
    $productModel = new Product();
    
    // Obtener todos los productos
    $products = $productModel->all();
    
    // Mapeo de productos a imágenes (ajusta según tus productos)
    $imageMapping = [
        1 => 'uploads/products/producto1.jpg',
        2 => 'uploads/products/producto2.jpg', 
        3 => 'uploads/products/producto3.jpg'
    ];
    
    echo "<h3>Actualizando productos:</h3>";
    
    foreach ($products as $product) {
        $productId = $product['id'];
        
        if (isset($imageMapping[$productId])) {
            $imagePath = $imageMapping[$productId];
            
            // Verificar que el archivo existe
            $fullPath = __DIR__ . '/public/' . $imagePath;
            if (file_exists($fullPath)) {
                // Actualizar el producto
                $updateData = ['image' => $imagePath];
                $productModel->update($productId, $updateData);
                
                echo "✅ Producto ID {$productId} ({$product['name']}) actualizado con imagen: {$imagePath}<br>";
            } else {
                echo "❌ Archivo no encontrado: {$fullPath}<br>";
            }
        } else {
            echo "⚠️ No hay imagen mapeada para producto ID {$productId} ({$product['name']})<br>";
        }
    }
    
    echo "<h3>Verificación final:</h3>";
    
    // Verificar el resultado
    $updatedProducts = $productModel->all();
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Imagen</th><th>Archivo Existe</th></tr>";
    
    foreach ($updatedProducts as $product) {
        $imagePath = $product['image'];
        $fullPath = __DIR__ . '/public/' . $imagePath;
        $fileExists = file_exists($fullPath) ? '✅ Sí' : '❌ No';
        
        echo "<tr>";
        echo "<td>{$product['id']}</td>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$imagePath}</td>";
        echo "<td>{$fileExists}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 