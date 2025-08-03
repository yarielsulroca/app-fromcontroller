<div class="cat-product">
    <div class="w_content">
        <div class="women">
            <a href="#">
                <h4>Categoria #1 - <span>4449 items</span></h4>
            </a>
            <ul class="w_nav">
                <li>Ordernar por: </li>
                <li><a class="active" href="#">Más recientes</a></li> |
                <li><a href="#">Menor precio</li> |
                <li><a href="#">Mayor precio</a></li> 
                <div class="clearfix"></div>	
            </ul>
            <div class="clearfix"></div>	
        </div>
    </div>
    <!-- grids_of_4 -->
    <div class="grid-product">
        <?php foreach ($productos_ultimos as $producto): ?>
            <div class="product-grid">
                <div class="content_box">
                <a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>">
                <div class="left-grid-view grid-view-left">
                    <img src="<?= $this->assetImage($producto['imagen']) ?>" class="img-responsive watch-right" alt=""/>
                </div>
                </a>
                <h4><a href="<?= $this->url('producto') . '&id=' . $producto['id'] ?>"><?= $producto['nombre'] ?></a></h4>
                <p><?= $producto['descrip'] ?></p>
                <span>$<?= $producto['precio'] ?></span>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clearfix"></div>
    </div>
</div>