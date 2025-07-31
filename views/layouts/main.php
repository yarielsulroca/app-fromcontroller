<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $this->getTitle(); ?></title>
  <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">
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