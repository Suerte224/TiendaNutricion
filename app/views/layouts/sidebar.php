<h3>Categorías</h3>

<ul>
    <?php foreach ($categorias as $cat) : ?>
        <li>
            <a href="<?= BASE_URL ?>?controller=Producto&action=porCategoria&id=<?= $cat['id'] ?>">
                <?= $cat['nombre'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>
