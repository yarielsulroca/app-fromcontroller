<!-- Vista: error.php - Solo contiene la estructura específica de la página de error -->

<!-- Sección de Error -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Código de Error -->
                <div class="mb-4">
                    <h1 class="display-1 fw-bold text-muted"><?php echo $errorCode; ?></h1>
                </div>
                
                <!-- Título del Error -->
                <h2 class="display-4 fw-bold mb-4"><?php echo $errorTitle; ?></h2>
                
                <!-- Mensaje del Error -->
                <p class="lead text-muted mb-5"><?php echo $errorMessage; ?></p>
                
                <!-- Sugerencias -->
                <div class="mb-5">
                    <h5 class="mb-3">¿Qué puedes hacer?</h5>
                    <ul class="list-unstyled">
                        <?php foreach ($suggestions as $suggestion): ?>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-primary me-2"></i>
                            <?php echo $suggestion; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <!-- Botones de Acción -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?php echo $this->url('home'); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-home"></i> Volver al Inicio
                    </a>
                    <a href="<?php echo $this->url('contact'); ?>" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-envelope"></i> Contactar Soporte
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Navegación Rápida -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="mb-4">Navegación Rápida</h3>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?php echo $this->url('about'); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-info-circle"></i> Acerca de
                    </a>
                    <a href="<?php echo $this->url('services'); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-cogs"></i> Servicios
                    </a>
                    <a href="<?php echo $this->url('products'); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-shopping-cart"></i> Productos
                    </a>
                    <a href="<?php echo $this->url('blog'); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-blog"></i> Blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> 