<!-- Vista: admin/products/create.php - Formulario crear producto -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0"><?php echo $pageTitle; ?></h1>
                <a href="?route=products-admin" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Volver
                </a>
            </div>

            <?php if (isset($errors['general'])): ?>
            <div class="alert alert-danger">
                <?php echo $errors['general']; ?>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="?route=product-store" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del Producto *</label>
                                    <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                                           id="name" name="name" 
                                           value="<?php echo isset($old['name']) ? htmlspecialchars($old['name']) : ''; ?>" required>
                                    <?php if (isset($errors['name'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Descripción *</label>
                                    <textarea class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>" 
                                              id="description" name="description" rows="4" required><?php echo isset($old['description']) ? htmlspecialchars($old['description']) : ''; ?></textarea>
                                    <?php if (isset($errors['description'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['description']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Precio *</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>" 
                                                       id="price" name="price" 
                                                       value="<?php echo isset($old['price']) ? htmlspecialchars($old['price']) : ''; ?>" required>
                                            </div>
                                            <?php if (isset($errors['price'])): ?>
                                                <div class="invalid-feedback"><?php echo $errors['price']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock *</label>
                                            <input type="number" class="form-control <?php echo isset($errors['stock']) ? 'is-invalid' : ''; ?>" 
                                                   id="stock" name="stock" 
                                                   value="<?php echo isset($old['stock']) ? htmlspecialchars($old['stock']) : '0'; ?>" required>
                                            <?php if (isset($errors['stock'])): ?>
                                                <div class="invalid-feedback"><?php echo $errors['stock']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Categoría *</label>
                                    <select class="form-control <?php echo isset($errors['category']) ? 'is-invalid' : ''; ?>" 
                                            id="category" name="category" required>
                                        <option value="">Seleccionar categoría</option>
                                        <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo htmlspecialchars($category['category']); ?>" 
                                                <?php echo (isset($old['category']) && $old['category'] === $category['category']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($category['category']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['category'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['category']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Imagen del Producto</label>
                                    <input type="file" class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>" 
                                           id="image" name="image" accept="image/*">
                                    <div class="form-text">
                                        Formatos permitidos: JPG, PNG, GIF, WEBP<br>
                                        Tamaño máximo: 5MB
                                    </div>
                                    <?php if (isset($errors['image'])): ?>
                                        <div class="invalid-feedback"><?php echo $errors['image']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div id="imagePreview" class="mb-3" style="display: none;">
                                                <img id="previewImg" src="" alt="Vista previa" 
                                                     class="img-fluid rounded" style="max-height: 200px;">
                                            </div>
                                            <div id="imagePlaceholder" class="text-muted">
                                                <i class="fas fa-image fa-3x mb-2"></i>
                                                <p class="mb-0">Vista previa de la imagen</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Crear Producto
                            </button>
                            <a href="?route=products-admin" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Vista previa de imagen
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');
    const placeholder = document.getElementById('imagePlaceholder');
    const previewImg = document.getElementById('previewImg');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        }
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
        placeholder.style.display = 'block';
    }
});
</script>
