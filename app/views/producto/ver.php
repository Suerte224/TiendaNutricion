<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="layout">

    <aside class="sidebar">
        <?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>
    </aside>

    <main class="content product-detail">

        <div class="product-detail-card">

            <div class="product-detail-image">
                <?php if ($prod->imagen): ?>
                    <img src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                         alt="<?= htmlspecialchars($prod->nombre) ?>">
                <?php endif; ?>
            </div>

            <div class="product-detail-info">

                <h1><?= htmlspecialchars($prod->nombre) ?></h1>

                <p class="product-detail-desc">
                    <?= htmlspecialchars($prod->descripcion) ?>
                </p>

                <div class="product-detail-price">
                    <?= number_format($prod->precio, 2) ?> €
                </div>

                <button class="btn-primary">
                    Añadir al carrito
                </button>

            </div>

        </div>

    </main>

</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
