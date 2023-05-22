<h1>Registro</h1>

<div id="mensaje">
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "Complete") : ?>
    <strong id="mensaje_true">Registro Completado Correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] != "Complete"): ?>
    <strong id="mensaje_false">El Registro no se ha podido Completar Correctamente,</br> corrija los errores e intente nuevamente.</strong>
<?php endif; ?>
 
</div>

<form action="<?=base_url?>usuario/save" method="post">
    
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo isset($_SESSION['datos_registro']['nombre']) ? $_SESSION['datos_registro']['nombre'] : '';  ?>" required="true" />
    <?php echo isset($_SESSION['register']) ? Utils::mostrarError($_SESSION['register'], 'nombre') : '';  ?>
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" value="<?php echo isset($_SESSION['datos_registro']['apellido']) ? $_SESSION['datos_registro']['apellido'] : '';  ?>" required="true" />
    <?php echo isset($_SESSION['register']) ? Utils::mostrarError($_SESSION['register'], 'apellido') : ''; ?>
    
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo isset($_SESSION['datos_registro']['email']) ? $_SESSION['datos_registro']['email'] : '';  ?>" required="true" />
    <?php echo isset($_SESSION['register']) ? Utils::mostrarError($_SESSION['register'], 'email') : ''; ?>
    
    <label for="password1">Password</label>
    <input type="password" name="password1" required="true" />
    <?php echo isset($_SESSION['register']) ? Utils::mostrarError($_SESSION['register'], 'password1') : ''; ?>
    
    <label for="password2">Repetir Password</label>
    <input type="password" name="password2" required="true" />
    <?php echo isset($_SESSION['register']) ? Utils::mostrarError($_SESSION['register'], 'password2') : ''; ?>
    
    <input type="submit" value="Registrarse" />
</form>

<?php  
//BORRA LOS MENSAJES DEL REGISTRO
Utils::deleteSession('register');
?>