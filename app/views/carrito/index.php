<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="layout">

    <main class="content carrito">

        <h1 class="page-title">🛒 Mi carrito</h1>

        <?php if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])): ?>

            <p class="carrito-vacio">
                Tu carrito está vacío.
            </p>

            <a href="<?= BASE_URL ?>" class="btn-primary">
                Volver a la tienda
            </a>

        <?php else: ?>

            <div class="carrito-lista">

                <?php
                $total = 0;
                foreach ($_SESSION['carrito'] as $item):
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                    ?>

                    <div class="carrito-item">

                        <div class="carrito-img">
                            <img src="<?= BASE_URL ?>assets/images/<?= $item['imagen'] ?>"
                                 alt="<?= htmlspecialchars($item['nombre']) ?>">
                        </div>

                        <div class="carrito-info">
                            <h3><?= htmlspecialchars($item['nombre']) ?></h3>

                            <p class="carrito-precio">
                                <?= number_format($item['precio'], 2) ?> €
                            </p>

                            <p class="carrito-cantidad">
                                Cantidad: <?= $item['cantidad'] ?>
                            </p>

                            <p class="carrito-subtotal">
                                Subtotal: <?= number_format($subtotal, 2) ?> €
                            </p>

                            <a
                                href="<?= BASE_URL ?>?controller=Carrito&action=remove&id=<?= $item['producto_id'] ?>"
                                class="btn-remove"
                            >
                                ❌ Eliminar
                            </a>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <div class="carrito-resumen">

                <h2>Total: <?= number_format($total, 2) ?> €</h2>

                <div class="carrito-actions">
                    <a href="<?= BASE_URL ?>" class="btn-secondary">
                        Seguir comprando
                    </a>

                    <a href="<?= BASE_URL ?>?controller=Pedido&action=confirmar"
                       class="btn-primary">
                        Finalizar compra
                    </a>
                </div>

            </div>

        <?php endif; ?>

    </main>

</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
