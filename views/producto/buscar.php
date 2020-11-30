<?php
	if(!isset($_POST['busqueda'])){
		header("Location: index.php");
	}
include 'config/conexion.php';
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

?>
<!-- CAJA PRINCIPAL -->
<div id="contenido">

	<h1>Busqueda: <?=$_POST['busqueda']?></h1>
	
	<?php 
		$entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

		if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
                                    <div class="product">
					<a href="<?=base_url?>producto/ver&id=<?=$entrada['id']?>">
                                            <img src="<?=base_url?>uploads/images/<?=$entrada['imagen'] ?>">
						<h2><?=$entrada['nombre']?></h2>
						<span><?=$entrada['categoria']?></span>
                                                <p>$<?=$entrada['precio']?></p>
                                                <a href="<?=base_url?>carrito/add&id=<?=$entrada['id']?>" class="button">Comprar</a>
                                                
						
					</a>
                                    </div>
				</article>
	<?php
			endwhile;
		else:
	?>
		<div class="alerta">No hay productos con ese nombre.</div>
	<?php endif; ?>
</div> <!--fin principal-->
			
