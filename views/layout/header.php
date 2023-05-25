<?php require_once 'helpers/functions.php'; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Metal-Warriors (E-Shop)</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css"/>
        <script src="<?=base_url?>assets/js/funciones.js"></script>
    </head>
    <body>
        <div id="container">
            <!-- HEADER -->
            <header id="header">
                <div id="logo">
                    <a href="<?=base_url?>">Metal Warriors</a>
                </div>
            </header>

            <!-- MENU -->
            <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <li>
                        <a href="<?=base_url?>categoria/lista">Todas las Categorias</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?= substr($cat->nombre, 0, 12)?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </nav>
            
            <div id="content">