<?php
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Brand-X Nutrition</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/images/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/base.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/layout.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/components.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/pages.css">
</head>

<body>

<header class="main-header">
    <nav class="nav-container">

        <!-- LOGO -->
        <a href="<?= BASE_URL ?>" class="logo">
            <img src="<?= BASE_URL ?>assets/images/logo_positivo.png" alt="Brand-X Nutrition">
        </a>

        <!-- MENÚ -->
        <ul class="nav-links">

            <!-- PRODUCTOS (DESPLEGABLE) -->
            <li class="nav-item dropdown">
                <a href="<?= BASE_URL ?>?controller=Producto&action=porCategoria" class="dropdown-toggle">
                    Productos
                </a>

                <?php if (!empty($categorias)): ?>
                    <ul class="dropdown-menu">
                        <?php foreach ($categorias as $cat): ?>
                            <li>
                                <a href="<?= BASE_URL ?>?controller=Producto&action=porCategoria&id=<?= $cat['id'] ?>">
                                    <?= htmlspecialchars($cat['nombre']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>

            <li>
                <a href="<?= BASE_URL ?>?controller=Page&action=nosotros">Nosotros</a>
            </li>

            <li>
                <a href="<?= BASE_URL ?>?controller=Page&action=contacto">Contacto</a>
            </li>

        </ul>

        <!-- BUSCADOR -->
        <form action="<?= BASE_URL ?>" method="GET" class="buscador">
            <input type="hidden" name="controller" value="Producto">
            <input type="hidden" name="action" value="buscar">
            <input type="text" name="q" placeholder="Buscar productos..." required>
            <button type="submit">🔍</button>
        </form>

        <!-- USUARIO -->
        <div class="usuario-nav">
            <?php if (!isset($_SESSION['usuario'])): ?>
                <a href="<?= BASE_URL ?>?controller=Usuario&action=login">Login</a>
                <span>|</span>
                <a href="<?= BASE_URL ?>?controller=Usuario&action=registro">Registro</a>
            <?php else: ?>
                <span class="saludo">Hola, <?= htmlspecialchars($_SESSION['usuario']->nombre) ?></span>

                <?php if (Utils::isAdmin()): ?>
                    <a href="<?= BASE_URL ?>?controller=Admin&action=index" class="admin-link">Panel Admin</a>
                <?php endif; ?>

                <a href="<?= BASE_URL ?>?controller=Usuario&action=logout" class="logout">Salir</a>
            <?php endif; ?>
        </div>

        <!-- CARRITO -->
        <a href="<?= BASE_URL ?>?controller=Carrito&action=index" class="cart-link">
            🛒
            <?php if (!empty($_SESSION['carrito'])): ?>
                <span class="cart-count">
            <?= array_sum(array_column($_SESSION['carrito'], 'cantidad')) ?>
        </span>
            <?php endif; ?>
        </a>


    </nav>
</header>
