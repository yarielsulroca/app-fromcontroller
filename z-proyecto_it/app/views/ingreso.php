<div class="account_grid">
    <div class="login-right">
        <h3>INGRESO DE USUARIO</h3>
            <form action="#" method="post">
                <div>
                    <span>E-Mail:</span>
                    <input type="text" name="email"> 
                </div>
                <div>
                    <span>Contraseña:</span>
                    <input type="password" name="pass"> 
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