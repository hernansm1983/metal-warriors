<?php if(isset($editar) && isset($pro) && is_object($pro)): ?>
    <h1>Editar Producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url.'producto/save&id='.$pro->id; ?>
<?php else: ?>
    <h1>Crear un Nuevo Producto</h1>
    <?php $url_action = base_url.'producto/save'; ?>
<?php endif; ?>
    
<div id="mensaje">
    <!-- Mensaje Eliminar Imagen -->
    <?php if(isset($_SESSION['delete_img']) && $_SESSION['delete_img'] != ''): ?>
        <strong class="alert_green"><?=$_SESSION['delete_img']?></strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete_img'); ?>     
</div>  
    
<div class="form_container">
    
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>
    
    <label for="descripcion">Descripcion:</label>
    <textarea type="text" name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
    
    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" />
    
    <label for="stock">Stock:</label>
    <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" />
    
    <label for="categoria_id">Categoria:</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria_id">
        <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>" <?php if(isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id) echo "selected"; else echo ""; ?>>
            <?=$cat->nombre?>
        </option>
        <?php endwhile; ?>
    </select>
    </br>
    <?php if(isset($pro) && is_object($pro) && $pro->imagen): ?>
        <img src="<?=base_url.'uploads/images/'.$pro->imagen?>" class="thumb" />
        <a href="javascript:confirmarBorradoImagen('<?=base_url?>producto/eliminarImagen&id=<?=$pro->id?>&img=<?=$pro->imagen?>')" class="button button-small button-gestion button-red">Eliminar Foto</a>
    <?php else: ?>
        <img src="<?=base_url.'uploads/images/sin_imagen.png'?>" class="thumb" />
    <?php endif; ?>   
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" />
    
    </br>
    <input type="submit" value="Guardar" />
    
</form>
</div>  