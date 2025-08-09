

<div class="account_grid">
    <div class="login-right">
        <h3>INGRESO DE USUARIO</h3>
        <?php if (isset($errors['general'])): ?>
        <div class="alert alert-danger">
            <?php echo $errors['general']; ?>
        </div>
        <?php endif; ?>
            <form action="<?php echo $this->url('login'); ?>" method="post">
                <div>
                    <span>E-Mail:</span>
                    <input type="text" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo isset($old['email']) ? htmlspecialchars($old['email']) : ''; ?>" required> 
                    <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                    <?php endif; ?>
                </div>
                <div>
                    <span>Contraseña:</span>
                    <input type="password" name="pass"> 
                    <?php if (isset($errors['pass'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['pass']; ?></div>
                    <?php endif; ?>
                </div>
                <input type="submit" value="Ingresar">
                <br>
                <a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
            </form>
        </div>	
        <div class=" login-left">
        <h3>¿NUEVO USUARIO?</h3>
        <a class="acount-btn" href="<?php echo $this->url('registro'); ?>">Crear una cuenta</a>
    </div>
    <div class="clearfix"></div>
</div>