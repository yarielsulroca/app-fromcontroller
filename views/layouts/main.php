<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        </nav>
    </header>
    
    <main>
        <?php echo $content; ?>
    </main>
    
    <footer>
        <p>&copy; 2025 Mi Sitio Web</p>
    </footer>
    
    <?php foreach ($this->getScripts() as $script): ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html>