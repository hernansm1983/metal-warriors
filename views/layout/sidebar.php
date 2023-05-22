<!-- BARRA LATERAL -->
<aside id="lateral">

	<div id="carrito" class="block_aside">
		<h3>Mi carrito</h3>
		<ul>
			<?php $stats = Utils::statsCarrito(); ?>
                        <li><span class="texto_carrito">Unidades: (<?=$stats['unidades_totales']?>)</span></li>
                        <li><span class="texto_carrito">Total: $ <?=$stats['total']?></span></li>
			<li><a href="<?=base_url?>carrito/index">Ver el carrito</a></li>
		</ul>
	</div>
	
	<div id="login" class="block_aside">
		
		<?php if(!isset($_SESSION['identity'])): ?>
			<h3>Entrar a la web</h3>
			<form action="<?=base_url?>usuario/login" method="post">
				<label for="email">Email</label>
                                <input type="email" name="email" required="true"/>
				<label for="password">Contraseña</label>
                                <input type="password" name="password" required="true"/>
				<input type="submit" value="Enviar" />
			</form>
		<?php else: ?>
			<h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellido?></h3>
		<?php endif; ?>
                <?php if(isset($_SESSION['error_login'])) echo "<div id='mensaje_login_false'>".$_SESSION['error_login']."</div>"; ?>
                <?php if(isset($_SESSION['identity'])) echo "<b>Rol:</b> ".$_SESSION['identity']->rol; ?>
                <?php Utils::deleteSession('error_login');?>
		<ul>
			<?php if(isset($_SESSION['admin'])): ?>
				<li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
				<li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
				<li><a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a></li>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identity'])): ?>
				<li><a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a></li>
				<li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
			<?php else: ?> 
				<li><a href="<?=base_url?>usuario/registro">Registrate aqui</a></li>
			<?php endif; ?> 
		</ul>
	</div>

</aside>

<!-- CONTENIDO CENTRAL -->
<div id="central">