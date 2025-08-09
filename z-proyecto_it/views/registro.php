<div class="register">
    <div class="register-top-grid">
        <h3>NUEVO USUARIO</h3>
        <form action="<?php echo $this->url('registrar'); ?>" method="post">
            <div class="mation">
                <span>Nombre: <label>*</label></span>
                <input type="text" name="nombre" value="<?php echo isset($old['nombre']) ? htmlspecialchars($old['nombre']) : ''; ?>"> 
                <?php if (isset($errors['nombre'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['nombre']; ?></div>
                <?php endif; ?>
                <span>Apellido: <label>*</label></span>
                <input type="text" name="apellido" value="<?php echo isset($old['apellido']) ? htmlspecialchars($old['apellido']) : ''; ?>"> 
                <?php if (isset($errors['apellido'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['apellido']; ?></div>
                <?php endif; ?>
                <span>E-Mail: <label>*</label></span>
                <input type="text" name="email" value="<?php echo isset($old['email']) ? htmlspecialchars($old['email']) : ''; ?>">
                <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
                <span>Contraseña: <label>*</label></span>
                <input type="password" name="pass">
                <?php if (isset($errors['pass'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['pass']; ?></div>
                <?php endif; ?>
                <div class="register-but">
                    <input type="submit" value="Registrarme">
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>