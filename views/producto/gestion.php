<h1>Gestion de Productos</h1>
<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<div id="mensaje">
    <!-- Mensaje Alta Producto -->
    <?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
        <strong class="alert_green">El Producto ha sido creado correctamente</strong>
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
        <strong class="alert_red">El Producto NO ha sido creado correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('producto'); ?>     
    <!-- Mensaje Eliminar Producto -->   
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
        <strong class="alert_green">El Producto ha sido eliminado correctamente</strong>
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
        <strong class="alert_red">El Producto NO ha sido eliminado correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?> 
</div>
</br>
<table>
    <tr>
        <th>ID</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Eliminar</th>
    </tr>
<?php while($prod = $productos->fetch_object()): ?>
    <tr>
        <td><?=$prod->id?></td>
        <td>
            <?php if(!$prod->imagen) : ?>
                <img src="<?=base_url?>uploads/images/sin_imagen.png" width="50" height="50" />
            <?php else: ?>
                <img src="<?=base_url?>uploads/images/<?=$prod->imagen?>" width="50" height="50" />
            <?php endif; ?>
        </td>
        <td><?=$prod->nombre?></td>
        <td><?=$prod->precio?></td>
        <td><?=$prod->stock?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
            <a href="javascript:confirmarBorradoProducto('<?=base_url?>producto/eliminar&id=<?=$prod->id?>')" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>
</br>
</br>