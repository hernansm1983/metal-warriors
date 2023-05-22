<h1>Carrito de Compras</h1>
<br/>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
    $stats = Utils::statsCarrito();?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Acciones</th>
        </tr>
    <?php foreach ($carrito as $indice => $elemento) { 
            $producto = $elemento['producto'];?>
          <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>"  class="img_carrito" />
                <?php else : ?>
                    <img src="<?=base_url.'uploads/images/sin_imagen.png'?>" class="thumb" />
                <?php endif; ?>
            </td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->precio?></td>
            <td><?=$elemento['unidades']?></td>
            <td>
                <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button-unidades">+</a>
                <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button-unidades">-</a>
                <br/>
                <a href="javascript:confirmarBorradoProductoCarrito('<?=base_url?>carrito/remove&index=<?=$indice?>')" class="button button-red">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
        <tr>
            <td colspan="5" class="carrito_total">Total = $ <?=$stats['total']?></td>
        </tr>
    </table>
    <br /><br/>
    <div class="delete-carrito">
        <a href="javascript:confirmarBorradoCarrito('<?=base_url?>carrito/delete_all')" class="button button-delete button-red">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Confirmar Compra</a>
    </div>
<?php }else{ ?>
    <span><h3>El Carrito esta vacio</h3></span>
<?php } ?>