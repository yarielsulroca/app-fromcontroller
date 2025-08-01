<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
    
    <!-- Estilos CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/components.css">
    
    <!-- Estilos adicionales específicos de la página -->
    <?php foreach ($this->getStyles() as $style): ?>
        <?php echo $style; ?>
    <?php endforeach; ?>
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $this->url('home'); ?>">
                <i class="fas fa-home"></i> Mi Sitio Web
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('home'); ?>" href="<?php echo $this->url('home'); ?>">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('about'); ?>" href="<?php echo $this->url('about'); ?>">
                            <i class="fas fa-info-circle"></i> Acerca de
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('services'); ?>" href="<?php echo $this->url('services'); ?>">
                            <i class="fas fa-cogs"></i> Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('products'); ?>" href="<?php echo $this->url('products'); ?>">
                            <i class="fas fa-shopping-cart"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('blog'); ?>" href="<?php echo $this->url('blog'); ?>">
                            <i class="fas fa-blog"></i> Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('contact'); ?>" href="<?php echo $this->url('contact'); ?>">
                            <i class="fas fa-envelope"></i> Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main>
        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-home"></i> Mi Sitio Web</h5>
                    <p>Un ejemplo de implementación del patrón Front Controller con sistema de layouts reutilizables.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $this->url('home'); ?>" class="text-light">Inicio</a></li>
                        <li><a href="<?php echo $this->url('about'); ?>" class="text-light">Acerca de</a></li>
                        <li><a href="<?php echo $this->url('services'); ?>" class="text-light">Servicios</a></li>
                        <li><a href="<?php echo $this->url('contact'); ?>" class="text-light">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>
                        <i class="fas fa-envelope"></i> info@misitioweb.com<br>
                        <i class="fas fa-phone"></i> +1 234 567 890<br>
                        <i class="fas fa-map-marker-alt"></i> Ciudad, País
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> Mi Sitio Web. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/resource-interceptor.js"></script>
    <script src="assets/js/error-handler.js"></script>
    <script src="assets/js/dev-config.js"></script>
    
    <!-- Scripts adicionales específicos de la página -->
    <?php foreach ($this->getScripts() as $script): ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html> 