<?php

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
</head>
<body>

</body>
</html>
<header style="border-bottom:1px solid #ccc; padding:10px">

    <nav class="nav-container">
        <a href="<?= BASE_URL?>">Inicio</a>
        |
        <a href="<?= BASE_URL?>?controller=Producto&action=porCategoria">Productos</a>


        <form action="<?= BASE_URL ?>" method="GET" class="buscador" style="display:inline;">
            <input type="hidden" name="controller" value="Producto">
            <input type="hidden" name="action" value="buscar">

            <input type="text" name="q" placeholder="Buscar productos..." required>

            <button type="submit" title="Buscar">
                🔍
            </button>
        </form>
         <div class="usuario-nav">
             <?php if (!isset($_SESSION['usuario'])) : ?>
                 <a href="<?= BASE_URL ?>?controller=Usuario&action=login">Login</a>
             |
                 <a href="<?=BASE_URL?>?controller=Usuario&action=registro">Registro</a>
             <?php else : ?>
                 <span><?= $_SESSION['usuario']->nombre ?></span>
                 |
                 <a href="<?= BASE_URL ?>?controller=Usuario&action=logout">Salir</a>
             <?php endif; ?>
         </div>

        </nav>


</header>

