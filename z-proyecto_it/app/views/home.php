<!-- Vista: home.php - Solo contiene la estructura específica de la página de inicio -->
<!-- PRODUCTOS DESTACADOS -->
<div class="shoes-grid">
    <div class="products">
        <h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
    </div>
    <div class="product-left">
        <?php foreach ($productos_destacados as $producto): ?>
        <div class="col-sm-4 col-md-4 chain-grid">
            <a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>"><img class="img-responsive chain" src="<?= $this->assetImage($producto['imagen']) ?>" alt=" " /></a>
            <div class="grid-chain-bottom">
                <h6><a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>"><?= $producto['nombre'] ?></a></h6>
                <div class="star-price">
                    <div class="dolor-grid"> 
                        <span class="actual"><?= $producto['precio'] ?>$</span>
                    </div>
                    <a class="now-get get-cart" href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>">VER MÁS</a> 
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- ULTIMOS PRODUCTOS -->
<div class="shoes-grid">
    <div class="products">
        <h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
        <a class="view-all" href="<?php echo $this->url('productos'); ?>">VER TODOS<span></span></a>
    </div>
    <div class="product-left">
        <?php foreach ($productos_ultimos as $producto): ?>
        <div class="col-sm-4 col-md-4 chain-grid">
            <a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>"><img class="img-responsive chain" src="<?= $this->assetImage($producto['imagen']) ?>" alt=" " /></a>
            <span class="star"></span>
            <div class="grid-chain-bottom">
                <h6><a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>"><?= $producto['nombre'] ?></a></h6>
                <div class="star-price">
                    <div class="dolor-grid"> 
                        <span class="actual"><?= $producto['precio'] ?>$</span>
                    </div>
                    <a class="now-get get-cart" href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>">VER MÁS</a> 
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>