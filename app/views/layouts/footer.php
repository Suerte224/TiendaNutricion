<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav>
    <a href="<?= BASE_URL ?>">Inicio</a> |
    <a href="<?= BASE_URL ?>?controller=Categoria$action=index">
        Categorias
    </a>|
    <form action="<?= BASE_URL?>" method="GET" style="display:inline;">
        <input type="hidden" name="controller" value="Producto">
        <input type="hidden" name="action" value="buscar">
        <input type="text" name="q" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    |
    <a href="<?= BASE_URL?>?controller=Usuario&action=login">
        Login
    </a>
</nav>
</body>
</html>
<hr>