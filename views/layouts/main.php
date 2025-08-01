<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $this->getTitle(); ?></title>
    <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">

    <!-- Estilos CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/components.css">

  <?php foreach ($this->getStyles() as $style): ?>
      <?php echo $style; ?>
  <?php endforeach; ?>
</head>
<body>
    <header>
       <h1>Plantilla Madre hereda</h1>
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
        <!-- Navegación fin -->  
    </header>
    
    <main>
        <?php echo $content; ?>
    </main>
    
    <footer>
        <p>&copy; 2025 Mi Sitio Web EducacionIT</p>
    </footer>
    
    <?php foreach ($this->getScripts() as $script): ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html>