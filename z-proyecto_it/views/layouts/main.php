<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $this->getMetaDescription(); ?>">
    <title><?php echo $this->getTitle(); ?></title>
	<title></title>
	<link href="<?= $this->asset("css/bootstrap.css") ?>" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="<?= $this->asset("css/style.css") ?>" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="<?= $this->asset("js/jquery.min.js") ?>"></script>
	<!--script-->
	</head>
	<body> 
		<!--header-->
		<div class="header">
			<div class="bottom-header">
				<div class="container">
					<div class="header-bottom-left">
						<div class="logo"><a href="<?php echo $this->url('home'); ?>">Comercio<strong>IT</strong></a></div>
						<!--div class="search">
							<input type="text" name="q">
							<input type="submit" value="BUSCAR">
						</div-->
						<div class="clearfix"></div>
					</div>
					<div class="header-bottom-right">					
						<!--div class="account">
							<a href="ingreso.html"><span></span> TU CUENTA</a>
						</div-->
						<ul class="login">
							<li><a href="<?php echo $this->url('ingreso'); ?>"><span></span> INGRESAR</a></li>
							&nbsp;|&nbsp;
							<li><a href="<?php echo $this->url('registro'); ?>">REGISTRARME</a></li>
							&nbsp;|&nbsp;
							<li><a href="<?php echo $this->url('contacto'); ?>">CONTACTO</a></li>
						</ul>
						<!--div class="cart"><a href="#"><span></span>CART</a></div-->
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>	
				</div>
			</div>
		</div>
		<!---->
        <!-- Contenido principal -->
		<div class="container">
            <section id="page">
                <?php echo $content; ?>
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
		<script src="<?= $this->asset("js/custom.js") ?>"></script>
	</body>
</html>