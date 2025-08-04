<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">
    <!-- Estilos CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <title><?php echo $this->getTitle(); ?></title>

    <?php foreach ($this->getStyles() as $style): ?>
        <?php echo $style; ?>
    <?php endforeach; ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $this->url('home'); ?>" class="<?php echo $this->isActive('home'); ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->url('about'); ?>" class="<?php echo $this->isActive('about'); ?>">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->url('contact'); ?>" class="<?php echo $this->isActive('contact'); ?>">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $this->url('product'); ?>" class="<?php echo $this->isActive('product'); ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->url('services'); ?>" class="<?php echo $this->isActive('services'); ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->url('blog'); ?>" class="<?php echo $this->isActive('blog'); ?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->url('blog-post'); ?>" class="<?php echo $this->isActive('blog-post'); ?>">Blog Post</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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