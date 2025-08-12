
<!-- Vista: about.php - Solo contiene la estructura específica de la página Acerca de -->

<!-- Sección Hero -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold"><?php echo $pageTitle; ?></h1>
                <p class="lead">Conoce nuestra historia, misión y valores que nos hacen únicos</p>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Información de la Empresa -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">Nuestra Historia</h2>
                <p class="lead text-muted mb-4">
                    Fundada en <?php echo $companyInfo['founded']; ?>, <?php echo $companyInfo['name']; ?> 
                    ha crecido de ser una pequeña startup a una empresa líder en soluciones tecnológicas.
                </p>
                <p class="mb-4">
                    Desde nuestros inicios, nos hemos comprometido a proporcionar soluciones innovadoras 
                    que ayuden a nuestros clientes a alcanzar sus objetivos de negocio. Con más de 
                    <?php echo $companyInfo['employees']; ?> empleados y <?php echo $companyInfo['clients']; ?> 
                    clientes satisfechos, continuamos expandiendo nuestro impacto en la industria tecnológica.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row text-center">
                    <div class="col-6 mb-4">
                        <div class="p-4 bg-light rounded">
                            <h3 class="display-4 fw-bold text-primary"><?php echo $companyInfo['employees']; ?></h3>
                            <p class="text-muted">Empleados</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="p-4 bg-light rounded">
                            <h3 class="display-4 fw-bold text-primary"><?php echo $companyInfo['clients']; ?></h3>
                            <p class="text-muted">Clientes</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="p-4 bg-light rounded">
                            <h3 class="display-4 fw-bold text-primary">500+</h3>
                            <p class="text-muted">Proyectos</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="p-4 bg-light rounded">
                            <h3 class="display-4 fw-bold text-primary">5</h3>
                            <p class="text-muted">Años</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección Misión y Visión -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-bullseye" style="font-size: 3rem; color: #667eea;"></i>
                        </div>
                        <h3 class="card-title text-center mb-3">Nuestra Misión</h3>
                        <p class="card-text text-muted text-center">
                            <?php echo $mission; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-eye" style="font-size: 3rem; color: #667eea;"></i>
                        </div>
                        <h3 class="card-title text-center mb-3">Nuestra Visión</h3>
                        <p class="card-text text-muted text-center">
                            <?php echo $vision; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Valores -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold">Nuestros Valores</h2>
                <p class="lead text-muted">Los principios que guían nuestro trabajo y relaciones</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($values as $index => $value): ?>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="fw-bold"><?php echo $index + 1; ?></span>
                        </div>
                    </div>
                    <h5 class="fw-bold"><?php echo $value; ?></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección CTA -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-4">¿Te gustaría unirte a nuestro equipo?</h2>
                <p class="lead mb-4">Estamos siempre buscando talento apasionado por la tecnología y la innovación.</p>
                <a href="<?php echo $this->url('contact'); ?>" class="btn btn-light btn-lg">
                    <i class="fas fa-users"></i> Contáctanos
                </a>
            </div>
        </div>
    </div>
</section> 
