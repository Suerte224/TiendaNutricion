<?php
  require_once __DIR__ . '/../layouts/header.php';?>

<h1>Panel de administracion</h1>

    <ul>
        <li>
            <a href="<?= BASE_URL ?>?controller=Categoria&action=index">
                Gestionar categorías
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>?controller=Marca&action=index">
                Gestionar marcas
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>?controller=Usuario&action=index">
                Gestionar usuarios
            </a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>?controller=Pedido&action=index">
                Ver pedidos
            </a>
        </li>
    </ul>

<?php require_once __DIR__ . '/../layouts/footer.php';?>