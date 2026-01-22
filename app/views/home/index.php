<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <?php require_once __DIR__ . "/../layouts/sidebar.php"; ?>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main-content">

        <!-- HERO -->
        <section class="hero">
            <div class="hero-text">
                <h1>Nutrición deportiva de alto nivel</h1>
                <p>Proteínas, creatina, pre-entrenos y suplementos premium</p>
                <a href="<?= BASE_URL ?>" class="btn-primary">
                    Ver productos
                </a>
            </div>
        </section>

        <!-- PRODUCTOS DESTACADOS -->
        <section class="section">
            <h2>⭐ Productos destacados</h2>

            <div class="products-grid">
                <?php foreach (array_slice($productos, 0, 4) as $prod) : ?>
                    <div class="product-card">

                        <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                            <?php if ($prod->imagen): ?>
                                <img
                                        src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                        class="product-image"
                                        alt="<?= htmlspecialchars($prod->nombre) ?>"
                                >
                            <?php endif; ?>
                        </a>

                        <h3 class="product-title">
                            <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                                <?= htmlspecialchars($prod->nombre) ?>
                            </a>
                        </h3>

                        <p class="product-desc"><?= htmlspecialchars($prod->descripcion) ?></p>
                        <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- OFERTAS -->
        <section class="section section-alt">
            <h2>🔥 Ofertas</h2>

            <div class="products-grid">
                <?php foreach ($productos as $prod) : ?>
                    <?php if ($prod->oferta == 1): ?>
                        <div class="product-card offer">

                            <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                                <?php if ($prod->imagen): ?>
                                    <img
                                            src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                            class="product-image"
                                            alt="<?= htmlspecialchars($prod->nombre) ?>"
                                    >
                                <?php endif; ?>
                            </a>

                            <h3 class="product-title">
                                <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                                    <?= htmlspecialchars($prod->nombre) ?>
                                </a>
                            </h3>

                            <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- TODOS LOS PRODUCTOS -->
        <section class="section">
            <h2>📦 Todos los productos</h2>

            <?php if (Utils::isAdmin()) : ?>
                <a href="<?= BASE_URL ?>?controller=Producto&action=crear" class="btn-add-product">
                    Añadir Producto
                </a>
            <?php endif; ?>

            <div class="products-grid">
                <?php foreach ($productos as $prod) : ?>
                    <div class="product-card">

                        <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                            <?php if ($prod->imagen): ?>
                                <img
                                        src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                        class="product-image"
                                        alt="<?= htmlspecialchars($prod->nombre) ?>"
                                >
                            <?php endif; ?>
                        </a>

                        <h3 class="product-title">
                            <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                                <?= htmlspecialchars($prod->nombre) ?>
                            </a>
                        </h3>

                        <p class="product-desc"><?= htmlspecialchars($prod->descripcion) ?></p>
                        <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>

                        <?php if (Utils::isAdmin()): ?>
                            <div class="product-admin">
                                <a href="<?= BASE_URL ?>?controller=Producto&action=editar&id=<?= $prod->id ?>">Editar</a>
                                |
                                <a href="<?= BASE_URL ?>?controller=Producto&action=eliminar&id=<?= $prod->id ?>"
                                   onclick="return confirm('¿Eliminar producto?')">
                                    Eliminar
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
