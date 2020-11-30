<?php if (isset($gestion)): ?>
	<h1>Gestionar pedidos</h1>
<?php else: ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<table>
	<tr>
            <td><b>Nº Pedido</b></td>
                <td><b>Coste</b></td>
                <td><b>Fecha</b></td>
                <td><b>Estado</b></td>
                <td><b>Ver pedido</b></td>
	</tr>
	<?php
	while ($ped = $pedidos->fetch_object()):
		?>

		<tr>
			<td>
				<a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
			</td>
			<td>
				$<?= $ped->coste ?> 
			</td>
			<td>
				<?= $ped->fecha ?>
			</td>
			<td>
				<?=Utils::showStatus($ped->estado)?>
			</td>
                        <td>
                            <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>" class="button button-gestion">Ver</a>
                        </td>
		</tr>

	<?php endwhile; ?>
</table>