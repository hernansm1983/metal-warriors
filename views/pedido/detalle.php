<h1>Detalles del Pedido Nro: <?=$pedido_id?></h1>
<div id="mensaje">
    <!-- Mensaje Update Estado -->
    <?php if(isset($_SESSION['update']) && $_SESSION['update'] == 'complete'): ?>
        <strong class="alert_green">El Estado del Pedido se ha guardado correctamente</strong>
    <?php elseif(isset($_SESSION['update']) && $_SESSION['update'] == 'failed'): ?>
        <strong class="alert_red">El Estado del Pedido No se ha podido guardar correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('update'); ?>     
</div>  
<?php if(isset($pedido)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
    <br/>
    <h3>Cambiar el estado del Pedido:</h3>
    <br/>
    <form action="<?=base_url?>pedido/estado" method="POST">
        <input type="hidden" name="pedido_id" value="<?=$pedido_id?>">
        <select name="estado">
            <option value="confirmado" <?php if($pedido_detalles->estado == 'confirmado') echo 'selected'?>>Pendiente</option>
            <option value="preparacion" <?php if($pedido_detalles->estado == 'preparacion') echo 'selected'?>>En Preparacion</option>
            <option value="listo" <?php if($pedido_detalles->estado == 'listo') echo 'selected'?>>Listo para Enviar</option>
            <option value="enviado" <?php if($pedido_detalles->estado == 'enviado') echo 'selected'?>>Enviado</option>
        </select>
        <input type="submit" value="Guardar Estado">
    </form>
    <br/>
    <br/>
    <?php endif; ?>

        <h3>Datos del Pedido:</h3>
        <br/>
        <pre>
            <b>Numero de Cuenta:</b> 9876543210 <br/>
            <b>Numero del Pedido:</b> <?=$pedido_detalles->id?> <br/>
            <b>Costo del Pedido:</b> <?=$pedido_detalles->costo?> <br/>
            <b>Estado del Pedido:</b> <?=Utils::showStatus($pedido_detalles->estado)?> <br/>
        </pre>

        <br/>
        <h3>Datos del Usuario:</h3>
        <br/>
        <pre>
            <b>ID del Usuario:</b> <?=$datos->usuario_id?> <br/>
            <b>Nombre:</b> <?=$datos->nombre?> <br/>
            <b>Apellido:</b> <?=$datos->apellido?> <br/>
            <b>E-mail:</b>  <?=$datos->email?> <br/>
            <b>Rol:</b>  <?=$datos->rol?> <br/>
            
        </pre>

        <br/>
        <h3>Datos de la Entrega:</h3>
        <br/>
        <pre>
            <b>Direccion:</b> <?=$pedido_detalles->direccion?> <br/>
            <b>Localidad:</b> <?=$pedido_detalles->localidad?> <br/>
            <b>Provincia:</b> <?=$pedido_detalles->provincia?> <br/>
        </pre>

        <br/>
        <h3>Productos Seleccionados:</h3>
        <br/>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php 
            while($producto = $productos->fetch_object()): ?>
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
                <td><?=$producto->unidades?></td>

            </tr>  

            <?php endwhile; ?>
        </table>
        <br/><br/>
<?php else : ?>
    <?php header('location:'.base_url);?>
<?php endif; ?>
