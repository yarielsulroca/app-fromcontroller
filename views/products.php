<!-- Vista: products.php - Página de productos -->

<!-- Sección Hero -->
<section class="hero-section bg-success text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3"><?php echo $heroTitle; ?></h1>
                <p class="lead mb-4"><?php echo $heroSubtitle; ?></p>
                <a href="#products" class="btn btn-light btn-lg">Ver Productos</a>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-shopping-cart fa-6x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Productos -->
<section id="products" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold"><?php echo $pageTitle; ?></h2>
                <p class="lead text-muted">Descubre nuestra gama de productos y soluciones</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-6 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <i class="<?php echo $product['image']; ?> fa-4x text-success"></i>
                        </div>
                        <h4 class="card-title text-center mb-3"><?php echo htmlspecialchars($product['name']); ?></h4>
                        <p class="card-text text-muted text-center mb-3"><?php echo htmlspecialchars($product['description']); ?></p>
                        
                        <div class="text-center mb-3">
                            <span class="badge bg-primary me-2"><?php echo htmlspecialchars($product['category']); ?></span>
                            <span class="h5 text-success fw-bold"><?php echo htmlspecialchars($product['price']); ?></span>
                        </div>
                        
                        <h6 class="fw-bold mb-2">Características:</h6>
                        <ul class="list-unstyled">
                            <?php foreach ($product['features'] as $feature): ?>
                            <li class="mb-1">
                                <i class="fas fa-check text-success me-2"></i>
                                <?php echo htmlspecialchars($feature); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="?route=products&action=detail&id=<?php echo $product['id']; ?>" 
                           class="btn btn-outline-success me-2">Ver Detalles</a>
                        <a href="?route=contact" class="btn btn-success">Solicitar Cotización</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección CTA -->
<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <h3 class="display-6 fw-bold mb-3">¿Necesitas algo personalizado?</h3>
        <p class="lead mb-4">Contáctanos para discutir tus necesidades específicas</p>
        <a href="?route=contact" class="btn btn-light btn-lg me-3">Contactar Ahora</a>
        <a href="?route=services" class="btn btn-outline-light btn-lg">Ver Servicios</a>
    </div>
</section>