<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<!-- HERO FULL WIDTH -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Nutrición deportiva de<br>alto nivel</h1>
            <p>Proteínas, creatina, pre-entrenos y suplementos premium</p>

        </div>

        <div class="hero-image">
            <img src="<?= BASE_URL ?>assets/images/a2.jpeg" alt="Brand-X Supplements">
        </div>
    </div>
</section>

<div class="layout">

    <main class="main-content">

        <!-- ⭐ PRODUCTOS DESTACADOS -->
        <section class="section">
            <h2>⭐ Productos destacados</h2>

            <div class="products-grid">
                <?php foreach ($destacados as $prod): ?>
                    <div class="product-card">

                        <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                            <?php if ($prod->imagen): ?>
                                <img src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                     class="product-image"
                                     alt="<?= htmlspecialchars($prod->nombre) ?>">
                            <?php endif; ?>
                        </a>

                        <h3 class="product-title"><?= htmlspecialchars($prod->nombre) ?></h3>
                        <p class="product-desc"><?= htmlspecialchars($prod->descripcion) ?></p>
                        <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- 🔥 OFERTAS -->
        <section class="section section-alt">
            <h2>🔥 Ofertas</h2>
            <div class="products-grid">
                <?php foreach ($ofertas as $prod): ?>

                    <div class="product-card offer">

                        <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                            <?php if ($prod->imagen): ?>
                                <img src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                     class="product-image"
                                     alt="<?= htmlspecialchars($prod->nombre) ?>">
                            <?php endif; ?>
                        </a>

                        <h3 class="product-title"><?= htmlspecialchars($prod->nombre) ?></h3>
                        <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- 📦 TODOS LOS PRODUCTOS -->

        <section class="section">
            <h2>📦 Todos los productos</h2>
            <?php if (Utils::isAdmin()): ?>
                <div class="admin-actions">
                    <a href="<?= BASE_URL ?>?controller=Producto&action=crear"
                       class="btn-admin-add">
                        ➕ Añadir producto
                    </a>
                </div>
            <?php endif; ?>
            <div class="products-grid">

                <?php foreach ($productos as $prod): ?>

                    <div class="product-card">

                        <a href="<?= BASE_URL ?>?controller=Producto&action=ver&id=<?= $prod->id ?>">
                            <?php if ($prod->imagen): ?>
                                <img src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>"
                                     class="product-image"
                                     alt="<?= htmlspecialchars($prod->nombre) ?>">
                            <?php endif; ?>
                        </a>

                        <h3 class="product-title"><?= htmlspecialchars($prod->nombre) ?></h3>
                        <p class="product-desc"><?= htmlspecialchars($prod->descripcion) ?></p>
                        <div class="product-price"><?= number_format($prod->precio, 2) ?> €</div>
                        <?php if (Utils::isAdmin()): ?>
                            <div class="admin-actions">
                                <a href="<?= BASE_URL ?>?controller=Producto&action=editar&id=<?= $prod->id ?>"
                                   class="btn-admin-edit">
                                    ✏️ Editar
                                </a>

                                <a href="<?= BASE_URL ?>?controller=Producto&action=eliminar&id=<?= $prod->id ?>"
                                   class="btn-admin-delete"
                                   onclick="return confirm('¿Seguro que quieres eliminar este producto?')">
                                    ❌ Eliminar
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>
            </div>
        </section>

        <!-- 🔢 PAGINACIÓN -->
        <div class="pagination">
            <?php if ($pagina > 1): ?>
                <a href="<?= BASE_URL ?>?page=<?= $pagina - 1 ?>" class="page-btn">⬅ Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <a href="<?= BASE_URL ?>?page=<?= $i ?>"
                   class="page-btn <?= ($i == $pagina) ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($pagina < $totalPaginas): ?>
                <a href="<?= BASE_URL ?>?page=<?= $pagina + 1 ?>" class="page-btn">Siguiente ➡</a>
            <?php endif; ?>
        </div>

    </main>
</div>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
