<!-- BARRA LATERAL -->
               <aside id="lateral">
                    <div id="login" class="block_aside">
                        <?php if(!isset($_SESSION['identity'])): ?>
                        <h3>Entrar al Sitio</h3>
                        <form action="<?=base_url?>usuario/login" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email" required="true" />
                            <label for="password">Contrasena</label>
                            <input type="password" name="password" required="true" />
                            <input type="submit" value="Enviar" />
                        </form>
                        <?php else : ?>
                            <h3>Bienvenido:</h3></br>
                            <b><?=$_SESSION['identity']->nombre?>, <?=$_SESSION['identity']->apellido?></b></br>
                        <?php endif; ?></br>
                        <?php if(isset($_SESSION['error_login'])) echo "<div id='mensaje_login_false'>".$_SESSION['error_login']."</div>"; ?>
                        <?php if(isset($_SESSION['identity'])) echo "<b>Rol:</b> ".$_SESSION['identity']->rol; ?>
                        <?php if(isset($_SESSION['carrito'])) : ?>
                        <br/><br/><br/>
                        <h3>Mi Carrito:</h3>
                            <?php $stats = Utils::statsCarrito(); ?> 
                            <b>Items:</b> <?=$stats['unidades_totales'];?><br/>
                            <b>Total:</b> $ <?=$stats['total'];?><br/>
                            <br/>
                            <a href="<?=base_url?>carrito/index" class="button-blue">Ver Carrito</a>
                        <br/>
                        <?php endif; ?>
                        <ul>
                            <?php if(isset($_SESSION['admin'])==true):?>
                                <li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
                                <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
                                <li><a href="<?=base_url?>pedido/gestion">Gestionar Pedidos</a></li>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['identity'])): ?>
                                <li><a href="<?=base_url?>pedido/mis_pedidos">Mis Pedidos</a></li>
                                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
                            <?php else: ?>
                                <li><a href="<?=base_url?>usuario/registro">Registrarse</a></li>
                            <?php endif; ?>
                                <li><a href="<?=base_url?>carrito/index">Carrito de Compras</a></li>
                        </ul>
                        <?php Utils::deleteSession('error_login');?>
                    </div>
                </aside>
                <!-- CONTENIDO CENTRAL -->
                <div id="central">