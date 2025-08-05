<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $this->getTitle(); ?></title>
    <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">

    <!-- Estilos CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="../js/jquery.min.js"></script>

    <?php foreach ($this->getStyles() as $style): ?>
      <?php echo $style; ?>
    <?php endforeach; ?>
</head>
<body>
    <header>
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $this->url('home'); ?>">
                    <i class="fas fa-home"></i> Comercio<strong>IT</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('home'); ?>" href="<?php echo $this->url('home'); ?>">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('ingreso'); ?>" href="<?php echo $this->url('ingreso'); ?>">
                            <i class="fas fa-info-circle"></i> INGRESAR
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('registro'); ?>" href="<?php echo $this->url('registro'); ?>">
                            <i class="fas fa-cogs"></i> REGISTRARME
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $this->isActive('contact'); ?>" href="<?php echo $this->url('contact'); ?>">
                            <i class="fas fa-shopping-cart"></i> CONTACTO
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navegación fin -->
    </header>

    <!---->
	<div class="container">
		<section id="page">
			<!-- PRODUCTOS DESTACADOS -->
            <div class="shoes-grid">
            <div class="products">
                <h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
            </div>
            <div class="product-left">
                <!-- Producto #1 -->
                <div class="col-sm-4 col-md-4 chain-grid">
                    <a href="producto.php"><img class="img-responsive chain" src="images/productos/P001.jpg" alt=" " /></a>
                    <div class="grid-chain-bottom">
                        <h6><a href="producto.php">Lorem ipsum dolor #1</a></h6>
                        <div class="star-price">
                            <div class="dolor-grid"> 
                                <span class="actual">300$</span>
                            </div>
                            <a class="now-get get-cart" href="#">VER MÁS</a> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- Producto #2 -->
                <div class="col-sm-4 col-md-4 chain-grid">
                    <a href="producto.php"><img class="img-responsive chain" src="images/productos/P002.jpg" alt=" " /></a>
                    <div class="grid-chain-bottom">
                        <h6><a href="producto.php">Lorem ipsum dolor #2</a></h6>
                        <div class="star-price">
                            <div class="dolor-grid"> 
                                <span class="actual">300$</span>
                            </div>
                            <a class="now-get get-cart" href="#">VER MÁS</a> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- Producto #3 -->
                <div class="col-sm-4 col-md-4 chain-grid grid-top-chain">
                    <a href="producto.php"><img class="img-responsive chain" src="images/productos/P003.jpg" alt=" " /></a>
                    <div class="grid-chain-bottom">
                        <h6><a href="producto.php">Lorem ipsum dolor #3</a></h6>
                        <div class="star-price">
                            <div class="dolor-grid"> 
                                <span class="actual">300$</span>
                            </div>
                            <a class="now-get get-cart" href="#">VER MÁS</a> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"> </div>
            </div>
            <!-- ULTIMOS PRODUCTOS -->
            <div class="shoes-grid">
                <div class="products">
                    <h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
                    <a class="view-all" href="productos.php">VER TODOS<span></span></a>
                </div>
                <div class="product-left">
                    <!-- Producto #1 -->
                    <div class="col-sm-4 col-md-4 chain-grid">
                        <a href="producto.php"><img class="img-responsive chain" src="images/productos/P004.jpg" alt=" " /></a>
                        <span class="star"></span>
                        <div class="grid-chain-bottom">
                            <h6><a href="producto.php">Lorem ipsum dolor #1</a></h6>
                            <div class="star-price">
                                <div class="dolor-grid"> 
                                    <span class="actual">300$</span>
                                </div>
                                <a class="now-get get-cart" href="#">VER MÁS</a> 
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Producto #2 -->
                    <div class="col-sm-4 col-md-4 chain-grid">
                        <a href="producto.php"><img class="img-responsive chain" src="images/productos/P005.jpg" alt=" " /></a>
                        <span class="star"></span>
                        <div class="grid-chain-bottom">
                            <h6><a href="producto.php">Lorem ipsum dolor #2</a></h6>
                            <div class="star-price">
                                <div class="dolor-grid"> 
                                    <span class="actual">300$</span>
                                </div>
                                <a class="now-get get-cart" href="#">VER MÁS</a> 
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Producto #3 -->
                    <div class="col-sm-4 col-md-4 chain-grid grid-top-chain">
                        <a href="producto.php"><img class="img-responsive chain" src="images/productos/P006.jpg" alt=" " /></a>
                        <span class="star"></span>
                        <div class="grid-chain-bottom">
                            <h6><a href="producto.php">Lorem ipsum dolor #3</a></h6>
                            <div class="star-price">
                                <div class="dolor-grid"> 
                                    <span class="actual">300$</span>
                                </div>
                                <a class="now-get get-cart" href="#">VER MÁS</a> 
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"> </div>
            </div>
		</section>
	</div>

	<!---->
	<div class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="latter">
						<h6>LA MEJOR MANERA DE COMPRAR ONLINE!</h6>
						<div class="clearfix"></div>
					</div>
					<div class="latter-right">
						<p>SEGUINOS</p>
						<ul class="face-in-to">
							<li><a href="http://www.twitter.com/educacionit"><span></span></a></li>
							<li><a href="http://www.facebook.com/educacionIT"><span class="facebook-in"></span></a></li>
							<div class="clearfix"></div>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-cate cate-bottom">
						<h6>DIRECCIÓN</h6>
						<ul>
							<li>Lavalle 648, 8° Piso</li>
							<li>C.A.B.A.</li>
							<li>Buenos Aires</li>
							<li>Argentina</li>
							<li class="phone">(011) 4328-0457</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>	
		<!--initiate accordion-->
		<script src="/js/custom.js"></script>

    <?php foreach ($this->getScripts() as $script): ?>
        <?php echo $script; ?>
    <?php endforeach; ?>
</body>
</html>