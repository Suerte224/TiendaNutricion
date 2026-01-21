<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div style="display:flex;">
    <aside style="width: 20%">
        <?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>
    </aside>

    <main style="width: 80%">
        <h1>Productos</h1>

        <?php if (Utils::isAdmin()) : ?>
            <a href="<?= BASE_URL ?>?controller=Producto&action=crear">
                Añadir Producto
            </a>
        <?php endif; ?>

        <?php foreach ($productos as $prod) : ?>
            <div style="border:1px solid #ccc; margin:10px; padding:10px;">
                <h3><?= $prod->nombre ?></h3>
                <p><?= $prod->descripcion ?></p>
                <strong><?= $prod->precio ?> €</strong>
                <?php if($prod->imagen):?>
                    <img src="<?=BASE_URL?>assets/images/<?=$prod->imagen?>" width="120">
                <?php endif;?>

                <?php if (Utils::isAdmin()) : ?>
                    <div style="margin-top:10px;">
                        <a href="<?= BASE_URL ?>?controller=Producto&action=editar&id=<?= $prod->id ?>">
                            Editar
                        </a>
                        |
                        <a href="<?= BASE_URL ?>?controller=Producto&action=eliminar&id=<?= $prod->id ?>"
                           onclick="return confirm('¿Seguro que quieres eliminar este producto?')">
                            Eliminar
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    </main>
</div>
