<!-- Vista: services/detail.php - Detalle de servicio -->

<!-- Sección Hero -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?route=home" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="?route=services" class="text-white">Servicios</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($service['name']); ?></li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($service['name']); ?></h1>
                <p class="lead mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-cogs fa-6x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Detalle del Servicio -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="mb-4">Descripción del Servicio</h2>
                        <p class="lead"><?php echo htmlspecialchars($service['description']); ?></p>
                        
                        <hr class="my-4">
                        
                        <h3 class="mb-3">Características Principales</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Categoría:</strong> <?php echo htmlspecialchars($service['category']); ?>
                            </li>
                            <?php if (!empty($service['duration'])): ?>
                            <li class="mb-2">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <strong>Duración:</strong> <?php echo htmlspecialchars($service['duration']); ?> horas
                            </li>
                            <?php endif; ?>
                            <li class="mb-2">
                                <i class="fas fa-calendar text-info me-2"></i>
                                <strong>Disponibilidad:</strong> Inmediata
                            </li>
                        </ul>
                        
                        <hr class="my-4">
                        
                        <h3 class="mb-3">¿Por qué elegirnos?</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-star text-warning me-2"></i>
                                    <span>Calidad garantizada</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-users text-primary me-2"></i>
                                    <span>Equipo experto</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-headset text-success me-2"></i>
                                    <span>Soporte 24/7</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-shield-alt text-info me-2"></i>
                                    <span>Seguridad total</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
<!-- Sección de Precio y CTA -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h4 class="fw-bold mb-3">Precio</h4>
                        <p class="display-6 text-success fw-bold mb-4">$<?php echo number_format($service['price'], 2); ?></p>
                        <a href="?route=contact" class="btn btn-primary btn-lg w-100">Solicitar Información</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>