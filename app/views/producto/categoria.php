<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>
    </aside>

    <!-- CONTENIDO -->
    <main class="content">

        <h1 class="category-title">Productos de la categoría</h1>

        <div class="products-grid">

            <?php foreach ($productos as $producto): ?>
                <a
                    href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $producto->id ?>"
                    class="product-card"
                >

                    <div class="product-image-wrapper">
                        <?php if (!empty($producto->imagen)): ?>
                            <img
                                src="<?= BASE_URL ?>assets/images/<?= $producto->imagen ?>"
                                alt="<?= htmlspecialchars($producto->nombre) ?>"
                                class="product-image"
                            >
                        <?php endif; ?>
                    </div>

                    <h3 class="product-title">
                        <?= htmlspecialchars($producto->nombre) ?>
                    </h3>

                    <p class="product-desc">
                        <?= htmlspecialchars($producto->descripcion) ?>
                    </p>

                    <div class="product-price">
                        <?= number_format($producto->precio, 2) ?> €
                    </div>

                </a>
            <?php endforeach; ?>

        </div>

    </main>

</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
