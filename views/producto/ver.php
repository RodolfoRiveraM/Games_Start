<?php if (isset($product)): ?>
	
	<div id="detail-product">
		<div class="image">
			<?php if ($product->imagen != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
            <div class="data"><h1><b><?= $product->nombre ?></b><p class="price">$<?= $product->precio ?></p></h1>
                        
                        
                        <p class="prices">Género: <?= $product->genero ?></p>
                        
                        <p class="prices">Publisher: <?= $product->publisher ?></p>
                        <p class="prices">Jugadores: <?= $product->jugadores ?></p>
                        <p class="prices">Estreno: <?= $product->fecha ?></p>
                        </br>
                        <h4>DESCRIPCIÓN:</h4>
                        
			<h5 class="description"><?= $product->descripcion ?></h5>
                        
                        
			
			<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
		</div>
	</div>
<?php else: ?>
	<h1>El producto no existe</h1>
<?php endif; ?>
