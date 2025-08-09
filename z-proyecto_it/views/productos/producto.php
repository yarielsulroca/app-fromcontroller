<div class="single_top">
	<div class="single_grid">
		<div class="grid images_3_of_2">
			<ul id="etalage">
				<li>
					<img class="etalage_thumb_image" src="<?= $this->assetImage($producto['imagen']) ?>" class="img-responsive" />
				</li>
			</ul>
			<div class="clearfix"></div>		
		</div>
		<div class="desc1 span_3_of_2">
			<h4><?= $producto['nombre'] ?></h4>
			<div class="cart-b">
				<div class="left-n ">$<?= $producto['precio'] ?></div>
				<a class="now-get get-cart-in" href="#">COMPRAR</a> 
				<div class="clearfix"></div>
			</div>
			<h6><?= $producto['stock'] ?> unid. en stock</h6>
			<p><?= $producto['descrip'] ?></p>
			<div class="share">
				<h5>Compartir Producto:</h5>
				<ul class="share_nav">
					<li><a href="#"><img src="<?= $this->assetImage("facebook.png") ?>" title="facebook"></a></li>
					<li><a href="#"><img src="<?= $this->assetImage("twitter.png") ?>" title="Twiiter"></a></li>
					<li><a href="#"><img src="<?= $this->assetImage("rss.png") ?>" title="Rss"></a></li>
					<li><a href="#"><img src="<?= $this->assetImage("gpluse.png") ?>" title="Google+"></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>