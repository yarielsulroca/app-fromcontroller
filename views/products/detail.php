<!-- Vista: products/detail.php - Detalle de producto -->

<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?route=home" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="?route=products" class="text-white">Productos</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($product['name']); ?></li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="lead mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
            <div class="col-lg-4 text-center">
                <?php if (!empty($product['image'])): ?>
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid rounded shadow" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php else: ?>
                <i class="fas fa-box fa-6x opacity-75"></i>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="mb-4">Detalles del Producto</h2>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-tag text-primary me-2"></i>
                                <strong>Categoría:</strong> <?php echo htmlspecialchars($product['category']); ?>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-boxes text-success me-2"></i>
                                <strong>Stock:</strong> <?php echo $product['stock']; ?> unidades
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-calendar text-info me-2"></i>
                                <strong>Actualizado:</strong> <?php echo date('d/m/Y', strtotime($product['updated_at'])); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h4 class="fw-bold mb-3">Precio</h4>
                        <p class="display-6 text-success fw-bold mb-4">$<?php echo number_format($product['price'], 2); ?></p>
                        <a href="?route=contact" class="btn btn-primary btn-lg w-100">Solicitar Información</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>