<!-- Vista: blog.php - Página del blog -->

<!-- Sección Hero -->
<section class="hero-section bg-primary text-white py-5">
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
                <p class="lead text-muted">Artículos, tutoriales y noticias del mundo tech</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($posts['data'] as $post): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <h4 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h4>
                        <p class="card-text text-muted"><?php echo htmlspecialchars($post['excerpt']); ?></p>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                <?php echo date('d/m/Y', strtotime($post['created_at'])); ?>
                            </small>
                            <span class="badge bg-success">Publicado</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center">
                        <a href="?route=blog-post&id=<?php echo $post['id']; ?>" 
                           class="btn btn-outline-primary">Leer Más</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Paginación -->
        <?php if ($posts['total_pages'] > 1): ?>
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Paginación del blog">
                    <ul class="pagination justify-content-center">
                        <?php if ($posts['has_prev']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?route=blog&page=<?php echo $posts['current_page'] - 1; ?>">Anterior</a>
                        </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $posts['total_pages']; $i++): ?>
                        <li class="page-item <?php echo $i == $posts['current_page'] ? 'active' : ''; ?>">
                            <a class="page-link" href="?route=blog&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>

                        <?php if ($posts['has_next']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?route=blog&page=<?php echo $posts['current_page'] + 1; ?>">Siguiente</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>