<!-- Vista: services.php - Página de servicios -->

<!-- Sección Hero -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3"><?php echo $heroTitle; ?></h1>
                <p class="lead mb-4"><?php echo $heroSubtitle; ?></p>
                <a href="#services" class="btn btn-light btn-lg">Ver Servicios</a>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-cogs fa-6x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Servicios -->
<section id="services" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold"><?php echo $pageTitle; ?></h2>
                <p class="lead text-muted">Descubre cómo podemos ayudarte a alcanzar tus objetivos</p>
            </div>
        </div>

        <div class="row g-4">
             <?php print_r($services) ?>
            <?php foreach ($services as $service): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <i class="<?php echo $service['icon']; ?> fa-3x text-primary"></i>
                        </div>
                        <h4 class="card-title text-center mb-3"><?php echo htmlspecialchars($service['name']); ?></h4>
                        <p class="card-text text-muted"><?php echo htmlspecialchars($service['description']); ?></p>
                        
                        <h6 class="fw-bold mb-2">Características:</h6>
                        <ul class="list-unstyled">
                            <?php foreach ($service['features'] as $feature): ?>
                            <li class="mb-1">
                                <i class="fas fa-check text-success me-2"></i>
                                <?php echo htmlspecialchars($feature); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="?route=services&action=detail&id=<?php echo array_search($service, $services); ?>" 
                           class="btn btn-outline-primary">Más Información</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección de Testimonios -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h3 class="display-6 fw-bold">Lo que dicen nuestros clientes</h3>
                <p class="lead text-muted">Testimonios de clientes satisfechos</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($testimonial['name']); ?></h6>
                                <small class="text-muted"><?php echo htmlspecialchars($testimonial['position']); ?></small>
                            </div>
                            <div class="flex-shrink-0">
                                <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                                <i class="fas fa-star text-warning"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p class="card-text">"<?php echo htmlspecialchars($testimonial['text']); ?>"</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección CTA -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h3 class="display-6 fw-bold mb-3">¿Listo para comenzar?</h3>
        <p class="lead mb-4">Contáctanos para discutir cómo podemos ayudarte con tu proyecto</p>
        <a href="?route=contact" class="btn btn-light btn-lg me-3">Contactar Ahora</a>
        <a href="?route=about" class="btn btn-outline-light btn-lg">Conocer Más</a>
    </div>
</section> 