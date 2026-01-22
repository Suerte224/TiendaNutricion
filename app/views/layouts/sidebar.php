

<div class="sidebar-box">
    <h3 class="sidebar-title">Categorias</h3>
    <ul class="category-list">

            <?php foreach ($categorias as $cat) : ?>
                <li class="category-item">
            <a href="<?= BASE_URL ?>?controller=Producto&action=porCategoria&id=<?= $cat['id'] ?>">
                <?= $cat['nombre'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>



