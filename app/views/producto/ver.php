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
                <form action="<?= BASE_URL ?>?controller=Carrito&action=add&id=<?=$prod->id?>" method="post">
                    <input type="hidden" name="producto_id" value="<?= $prod->id ?>">
                    <input type="hidden" name="precio" value="<?= $prod->precio ?>">
                    <!-- CANTIDAD -->
                    <div class="product-quantity">
                        <label for="cantidad">Cantidad</label>
                        <div class="quantity-controls">
                            <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
                            <input type="number" id="cantidad" value="1" min="1">
                            <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                        </div>
                    </div>



                <button type="submit" class="btn-primary">
                    Añadir al carrito
                </button>

            </div>
            </form>
        </div>



    </main>

</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
