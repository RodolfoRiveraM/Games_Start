<h1>Productos</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
                            <article>
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p>$<?= $product->precio ?></p>
				<!---	<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a> --->
                                <article>
			</div>
<?php endwhile; ?>
</br>


<?php $bandera=0; ?>

<?php while($cat = $categorias->fetch_object()): ?>




<?php if($bandera == 2): ?>
<?php $bandera2=0; ?>
<h1> <?=$cat->nombre;?></h1>
<?php while ($product = $productos2->fetch_object()): ?>

<?php if($cat->id == $product->categoria_id): ?>
<?php $bandera=1; ?>
			<div class="product">
                            <article>
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<!---	<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a> --->
                                <article>
			</div>
<?php $bandera2++; ?>
<?php if($bandera2 == 5): ?>
<?php break; ?>
<?php endif; ?>

<?php endif; ?>
		<?php endwhile; ?>
<?php endif; ?>

<?php if($bandera == 3): ?>
<h1> <?=$cat->nombre;?></h1>
<?php $bandera2=0; ?>
<?php while ($product = $productos3->fetch_object()): ?>

<?php if($cat->id == $product->categoria_id): ?>
<?php $bandera=2; ?>
			<div class="product">
                            <article>
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<!---	<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a> --->
                                <article>
			</div>
<?php $bandera2++; ?>
<?php if($bandera2 == 5): ?>
<?php break; ?>
<?php endif; ?>
<?php endif; ?>
		<?php endwhile; ?>
<?php endif; ?>

<?php if($bandera == 0): ?>
<h1> <?=$cat->nombre;?></h1>
<?php $bandera2=0; ?>
<?php while ($product = $productos4->fetch_object()): ?>

<?php if($cat->id == $product->categoria_id): ?>
<?php $bandera=3; ?>
			<div class="product">
                            <article>
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>
				<p><?= $product->precio ?></p>
				<!---	<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a> --->
                                <article>
			</div>
<?php $bandera2++; ?>
<?php if($bandera2 == 5): ?>
<?php break; ?>
<?php endif; ?>
<?php endif; ?>
		<?php endwhile; ?>
<?php endif; ?>





<?php endwhile; ?>


