<?php
require_once 'core/Database.php';
require_once 'models/User.php';
require_once 'models/Product.php';
require_once 'models/Service.php';
require_once 'models/BlogPost.php';

try {
    // Probar User
    $user = new User();
    $users = $user->all();
    echo "✅ Usuarios encontrados: " . count($users) . "\n";
    
    // Probar Product
    $product = new Product();
    $products = $product->all();
    echo "✅ Productos encontrados: " . count($products) . "\n";
    
    // Probar Service
    $service = new Service();
    $services = $service->all();
    echo "✅ Servicios encontrados: " . count($services) . "\n";
    
    // Probar BlogPost
    $blogPost = new BlogPost();
    $posts = $blogPost->getPublished();
    echo "✅ Posts publicados: " . count($posts) . "\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}