<!-- Vista: blog/post.php - Detalle de post del blog -->

<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?route=home" class="text-white">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="?route=blog" class="text-white">Blog</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
                <p class="lead mb-4"><?php echo htmlspecialchars($post['excerpt']); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="mb-4">Contenido</h2>
                        <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                        <hr class="my-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user text-primary me-2"></i>
                            <span>
                                <?php echo isset($author['name']) ? htmlspecialchars($author['name']) : 'Autor desconocido'; ?>
                            </span>
                            <span class="mx-3 text-muted">|</span>
                            <i class="fas fa-calendar text-info me-2"></i>
                            <span><?php echo date('d/m/Y', strtotime($post['created_at'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>