<h1>Gestionar Categorias</h1>
<?php //showArray($_SESSION['nueva_categoria'])?>
<div id="mensaje">
    
    <!-- Mensaje Nueva Categoria -->
    <?php if(isset($_SESSION['nueva_categoria']['nombre']) && $_SESSION['nueva_categoria']['nombre'] != ''): ?>
        <strong class="alert_red"><?=$_SESSION['nueva_categoria']['nombre']?></strong>
        <?php unset($_SESSION['nueva_categoria']['nombre']); ?> 
    <?php endif; ?>
    
    
    <!-- Mensaje Nueva Categoria -->
    <?php if(isset($_SESSION['nueva_categoria']) && $_SESSION['nueva_categoria'] == 'complete'): ?>
        <strong class="alert_green">La Categoria se guardado correctamente</strong>
    <?php elseif(isset($_SESSION['nueva_categoria']) && $_SESSION['nueva_categoria'] == 'failed'): ?>
        <strong class="alert_red">La Categoria NO se ha podido guardar correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('nueva_categoria'); ?> 
        
    <!-- Mensaje Update Estado -->
    <?php if(isset($_SESSION['delete_categoria']) && $_SESSION['delete_categoria'] == 'complete'): ?>
        <strong class="alert_green">La Categoria se ha Eliminado correctamente</strong>
    <?php elseif(isset($_SESSION['delete_categoria']) && $_SESSION['delete_categoria'] == 'failed'): ?>
        <strong class="alert_red">La Categoria NO se ha podido eliminar correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete_categoria'); ?>     
</div>
<a href="<?=base_url?>categoria/crear" class="button button-crear-categoria">Crear Categoria</a>
<br/><br/><br/>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Eliminar</th>
    </tr>
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id?></td>
        <td><?=$cat->nombre?></td>
        <td>
            <div>
                <a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="button button-gestion">Editar</a>
                <a href="javascript:confirmarBorradoCategoria('<?=base_url?>categoria/delete&id=<?=$cat->id?>')" class="button button-gestion button-red">Eliminar</a>    
            </div>
           
        </td>
    </tr>
    
<?php endwhile; ?>
</table>