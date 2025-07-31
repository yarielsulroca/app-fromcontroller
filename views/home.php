<!-- Vista: home.php - Solo contiene la estructura específica de la página de inicio -->

<!-- Sección Hero -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold animate__animated animate__fadeInLeft">
                    <?php echo $heroTitle; ?>
                </h1>
                <p class="lead animate__animated animate__fadeInLeft animate__delay-1s">
                    <?php echo $heroSubtitle; ?>
                </p>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="<?php echo $this->url('services'); ?>" class="btn btn-light btn-lg me-3">
                        <i class="fas fa-cogs"></i> Nuestros Servicios
                    </a>
                    <a href="<?php echo $this->url('contact'); ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-envelope"></i> Contáctanos
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center animate__animated animate__fadeInRight animate__delay-1s">
                <i class="fas fa-laptop-code" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Características -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold">¿Por qué elegirnos?</h2>
                <p class="lead text-muted">Descubre las ventajas que nos hacen únicos en el mercado</p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php foreach ($features as $feature): ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="<?php echo $feature['icon']; ?>" style="font-size: 3rem; color: #667eea;"></i>
                        </div>
                        <h5 class="card-title"><?php echo $feature['title']; ?></h5>
                        <p class="card-text text-muted"><?php echo $feature['description']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección de Estadísticas -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <h3 class="display-4 fw-bold text-primary">500+</h3>
                    <p class="text-muted">Proyectos Completados</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <h3 class="display-4 fw-bold text-primary">200+</h3>
                    <p class="text-muted">Clientes Satisfechos</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <h3 class="display-4 fw-bold text-primary">50+</h3>
                    <p class="text-muted">Expertos en Tecnología</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-4">
                    <h3 class="display-4 fw-bold text-primary">24/7</h3>
                    <p class="text-muted">Soporte Disponible</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección CTA -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-4">¿Listo para comenzar tu proyecto?</h2>
                <p class="lead text-muted mb-4">Nuestro equipo está listo para ayudarte a convertir tus ideas en realidad.</p>
                <a href="<?php echo $this->url('contact'); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-paper-plane"></i> Comenzar Ahora
                </a>
            </div>
        </div>
    </div>
</section> 