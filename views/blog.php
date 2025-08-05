<!-- Vista: blog.php - Página del blog -->

<!-- Sección Hero -->
<section class="hero-section bg-info text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3"><?php echo $heroTitle; ?></h1>
                <p class="lead mb-4"><?php echo $heroSubtitle; ?></p>
                <a href="#blog" class="btn btn-light btn-lg">Leer Artículos</a>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-blog fa-6x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sección del Blog -->
<section id="blog" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold"><?php echo $pageTitle; ?></h2>
                <p class="lead text-muted">Artículos, tutoriales y noticias del mundo de la tecnología</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($posts as $post): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <i class="<?php echo $post['image']; ?> fa-3x text-info"></i>
                        </div>
                        <h5 class="card-title mb-3"><?php echo htmlspecialchars($post['title']); ?></h5>
                        <p class="card-text text-muted"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                        
                        <div class="mb-3">
                            <span class="badge bg-primary me-1"><?php echo htmlspecialchars($post['category']); ?></span>
                            <?php foreach ($post['tags'] as $tag): ?>
                            <span class="badge bg-secondary me-1"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="fas fa-user me-1"></i>
                                <?php echo htmlspecialchars($post['author']); ?>
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                <?php echo date('d/m/Y', strtotime($post['date'])); ?>
                            </small>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="?route=blog&action=post&id=<?php echo $post['id']; ?>" 
                           class="btn btn-outline-info">Leer Más</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Paginación -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <nav aria-label="Navegación del blog">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Categorías -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h3 class="display-6 fw-bold">Categorías</h3>
                <p class="lead text-muted">Explora artículos por categoría</p>
            </div>
        </div>
        
        <div class="row g-3">
            <?php foreach ($categories as $category => $count): ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <a href="?route=blog&category=<?php echo urlencode($category); ?>" 
                   class="btn btn-outline-info w-100">
                    <?php echo htmlspecialchars($category); ?>
                    <span class="badge bg-info ms-1"><?php echo $count; ?></span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sección CTA -->
<section class="py-5 bg-info text-white">
    <div class="container text-center">
        <h3 class="display-6 fw-bold mb-3">¿Te gusta nuestro contenido?</h3>
        <p class="lead mb-4">Suscríbete para recibir las últimas noticias y artículos</p>
        <a href="?route=contact" class="btn btn-light btn-lg me-3">Suscribirse</a>
        <a href="?route=services" class="btn btn-outline-light btn-lg">Nuestros Servicios</a>
    </div>
</section> 