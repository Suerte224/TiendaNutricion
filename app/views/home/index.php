<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div style="display: flex;">

    <!-- SIDEBAR -->
    <aside style="width: 20%;">
        <?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main style="width: 80%;">

        <h1>Productos</h1>

        <?php if (Utils::isAdmin()) : ?>
            <a href="<?= BASE_URL ?>?controller=Producto&action=crear" class="btn-add-product">
                Añadir Producto
            </a>
        <?php endif; ?>

        <div class="products-grid">
            <?php foreach ($productos as $prod) : ?>

                <div class="product-card">

                    <h3 class="product-title">
                        <?= $prod->nombre ?>
                    </h3>

                    <p class="product-desc">
                        <?= $prod->descripcion ?>
                    </p>

                    <div class="product-price">
                        <?= $prod->precio ?> €
                    </div>

                    <?php if ($prod->imagen) : ?>
                        <img
                                src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                alt="<?= $prod->nombre ?>"
                                class="product-image"
                        >
                    <?php endif; ?>

                    <?php if (Utils::isAdmin()) : ?>
                        <div class="product-admin">
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
        </div>

    </main>

</div>
