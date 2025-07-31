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
       <nav>
        <a href="<?php echo $this->url('home'); ?>" class="<?php echo $this->isActive('home'); ?>">Inicio</a>
        <a href="<?php echo $this->url('about'); ?>" class="<?php echo $this->isActive('about'); ?>">Acerca de</a>
        <a href="<?php echo $this->url('contact'); ?>" class="<?php echo $this->isActive('contact'); ?>">Contacto</a>
        <a href="<?php echo $this->url('products'); ?>" class="<?php echo $this->isActive('products'); ?>">Productos</a>
        <a href="<?php echo $this->url('services'); ?>" class="<?php echo $this->isActive('services'); ?>">Servicios</a>
        <a href="<?php echo $this->url('blog'); ?>" class="<?php echo $this->isActive('blog'); ?>">Blog</a>
        <a href="<?php echo $this->url('blog-post'); ?>" class="<?php echo $this->isActive('blog-post'); ?>">Blog Post</a>
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