<!-- Vista: products.php - Página de productos -->

<!-- Sección Hero -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3"><?php echo $heroTitle; ?></h1>
                <p class="lead mb-4"><?php echo $heroSubtitle; ?></p>
                <a href="#products" class="btn btn-light btn-lg">Ver Productos</a>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-box fa-6x opacity-75"></i>
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
                <p class="lead text-muted">Descubre nuestra gama de productos innovadores</p>
            </div>
        </div>

        <!-- Filtros por categoría -->
        <?php if (!empty($categories)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="?route=products" class="btn btn-outline-primary">Todos</a>
                    <?php foreach ($categories as $category): ?>
                    <a href="?route=products&category=<?php echo urlencode($category['category']); ?>" 
                       class="btn btn-outline-primary"><?php echo htmlspecialchars($category['category']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row g-4">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                         class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php endif; ?>
                    <div class="card-body p-4">
                        <h4 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h4>
                        <p class="card-text text-muted"><?php echo htmlspecialchars($product['description']); ?></p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary"><?php echo htmlspecialchars($product['category']); ?></span>
                            <span class="text-success fw-bold">$<?php echo number_format($product['price'], 2); ?></span>
                        </div>
                        
                        <p class="text-muted small">
                            <i class="fas fa-boxes me-1"></i>
                            Stock: <?php echo $product['stock']; ?> unidades
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="?route=product-detail&id=<?php echo $product['id']; ?>" 
                           class="btn btn-outline-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>