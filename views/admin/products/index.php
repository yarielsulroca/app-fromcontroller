<!-- Vista: admin/products/index.php - Listado de productos (admin) -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Gestión de Productos</h1>
                <a href="?route=product-create" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Nuevo Producto
                </a>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['success']); endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['error']); endif; ?>

            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="mb-0">Lista de Productos</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar productos...">
                                <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($products['data'])): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-box fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No hay productos registrados</h5>
                        <p class="text-muted">Comienza creando tu primer producto</p>
                        <a href="?route=product-create" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Crear Producto
                        </a>
                    </div>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products['data'] as $product): ?>
                                <tr>
                                    <td>
                                        <?php if (!empty($product['image'])): ?>
                                            <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                                                 alt="<?php echo htmlspecialchars($product['name']); ?>" 
                                                 class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                            <?php if (!empty($product['description'])): ?>
                                            <div class="text-muted small">
                                                <?php echo htmlspecialchars(substr($product['description'], 0, 50)) . (strlen($product['description']) > 50 ? '...' : ''); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary"><?php echo htmlspecialchars($product['category']); ?></span>
                                    </td>
                                    <td>
                                        <strong class="text-success">$<?php echo number_format($product['price'], 2); ?></strong>
                                    </td>
                                    <td>
                                        <?php if ($product['stock'] > 0): ?>
                                            <span class="badge bg-success"><?php echo $product['stock']; ?> unidades</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Sin stock</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($product['stock'] > 0): ?>
                                            <span class="badge bg-success">Disponible</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">Agotado</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="?route=product-detail&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-outline-info" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="?route=product-edit&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-outline-primary" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?route=product-delete&id=<?php echo $product['id']; ?>" 
                                               class="btn btn-outline-danger" title="Eliminar"
                                               onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <?php if ($products['total_pages'] > 1): ?>
                    <nav aria-label="Navegación de páginas">
                        <ul class="pagination justify-content-center">
                            <?php if ($products['current_page'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?route=products-admin&page=<?php echo $products['current_page'] - 1; ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $products['total_pages']; $i++): ?>
                            <li class="page-item <?php echo $i == $products['current_page'] ? 'active' : ''; ?>">
                                <a class="page-link" href="?route=products-admin&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>

                            <?php if ($products['current_page'] < $products['total_pages']): ?>
                            <li class="page-item">
                                <a class="page-link" href="?route=products-admin&page=<?php echo $products['current_page'] + 1; ?>">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Búsqueda simple
document.getElementById('searchBtn').addEventListener('click', function() {
    const searchTerm = document.getElementById('searchInput').value.trim();
    if (searchTerm) {
        window.location.href = '?route=products-admin&search=' + encodeURIComponent(searchTerm);
    }
});

document.getElementById('searchInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('searchBtn').click();
    }
});
</script>
