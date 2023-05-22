<?php if(isset($gestion)): ?>
    <h1>Gestion de Pedidos</h1>
<?php else: ?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>
<table>
    <th>Nro. Pedido</th>
    <th>Costo</th>
    <th>Fecha</th>
    <th>Estado</th>
    

<?php while($pedido = $pedidos->fetch_object()) : ?>
    <tr>
        <td><a href="<?=base_url?>pedido/detalle&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
        <td>$ <?=$pedido->costo?></td>
        <td><?=$pedido->fecha?></td>
        <td><?=Utils::showStatus($pedido->estado)?></td>
    </tr>

<?php endwhile; ?>
</table>