<?php if(isset($editar) && isset($cat) && is_object($cat)):?>
    <h1>Editar: <?=$cat->nombre?></h1>
    <?php $value = $cat->nombre?>
    <?php $url_action=base_url.'categoria/save&id='.$cat->id;?>
<?php else: ?>
    <h1>Crear Categoria</h1>
    <?php $value = '';?>
    <?php $url_action=base_url.'categoria/save';?>
<?php endif; ?>
    
    
    
<?php /* if(isset($_SESSION['datos_categoria']['nombre'])){
    $value = $_SESSION['datos_categoria']['nombre'];
}else{$value='';}*/ ?>

<?php /*
<div id="mensaje">
<?php if(isset($_SESSION['nueva_categoria']) && $_SESSION['nueva_categoria'] == "complete") : ?>
    <strong id="mensaje_true">La Nueva Categoria se ha creado Correctamente</strong>
<?php elseif(isset($_SESSION['nueva_categoria']) && $_SESSION['nueva_categoria'] != "complete"): ?>
    <strong id="mensaje_false">La Nueva Categoria no se ha podido crear Correctamente,</br> corrija los errores e intente nuevamente.</strong>
<?php endif; ?>
 
</div>
*/ ?>
<form action="<?=$url_action?>" method="POST">
    <label for="nombre">Nombre</label>
    
    <input type="text" name="nombre" required="true" value="<?=isset($cat) && is_object($cat) ? $cat->nombre : ''; ?>" />
    <?php echo isset($_SESSION['nueva_categoria']) ? Utils::mostrarError($_SESSION['nueva_categoria'], 'nombre') : '';  ?>
    
    <input type="submit" value="Guardar" />
    <?php 
        //BORRA LOS CAMPOS INGRESADOS DEL REGISTRO
        //Utils::deleteSession('nueva_categoria');
        //Utils::deleteSession('datos_categoria');
        //unset($editar);
        
    ?>
</form>