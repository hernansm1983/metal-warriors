<!-------- INICIO DEL HEADER.PHP -------->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>E-Shop</title>
        <link rel="stylesheet" href="assets/css/styles.css"/>
    </head>
    <body>
        <div id="container">
            <!-- HEADER -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="Camiseta Logo"/>
                    <a href="index.php">Tienda de Camisetas</a>
                </div>
            </header>

            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Categoria 1</a>
                    </li>
                    <li>
                        <a href="#">Categoria 2</a>
                    </li>
                    <li>
                        <a href="#">Categoria 3</a>
                    </li>
                </ul>
            </nav>

            <div id="content"> 
                <!-------- FIN DEL HEADER.PHP -------->
                
                <!-------- INICIO DEL SIDEBAR.PHP -------->
                <!-- BARRA LATERAL -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <h3>Entrar al Sitio</h3>
                        <form action="#" method="post">

                            <label for="email">Email</label>
                            <input type="email" name="email" />

                            <label for="password">Contrasena</label>
                            <input type="password" name="password" />

                            <input type="submit" value="Enviar" />
                        </form>
                        
                        <ul>
                            <li><a href="#">Mis Pedidos</a></li>
                            <li><a href="#">Gestionar Pedidos</a></li>
                            <li><a href="#">Gestionar Categorias</a></li>
                            
                        </ul>
                        
                    </div>
                </aside>

                <!-- CONTENIDO CENTRAL -->
                <div id="central">
                    <!-------- FIN DEL SIDEBAR.PHP -------->
                    
                    <!-------- INICIO DEL INDEX-CONTENT.PHP -------->
                    <h1>Productos Destacados</h1>    
                    <div class="product">
                        <img src="assets/img/camiseta.png" />
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 Euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="assets/img/camiseta.png" />
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 Euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>

                    <div class="product">
                        <img src="assets/img/camiseta.png" />
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 Euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                <!-------- FIN DEL INDEX-CONTENT.PHP -------->
                
                <!-------- INICIO DEL FOOTER.PHP --------> 
                </div>
            </div>

            <!-- FOOTER -->
            <footer id="footer">
                <p>Desarrollado por Hernan Diego San Martin &copy; <?=date("Y");?></p>
            </footer>
        </div>
    </body>
</html>
<!-------- FIN DEL FOOTER.PHP -------->