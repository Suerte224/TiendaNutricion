<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Producto</h2>

<form action="<?= BASE_URL ?>?controller=Producto&action=actualizar" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $prod->id ?>">
    <input type="hidden" name="imagen_actual" value="<?= $prod->imagen ?>">

    <label>Nombre</label>
    <input type="text" name="nombre" value="<?= $prod->nombre ?>" required><br><br>

    <label>Descripción</label>
    <input type="text" name="descripcion" value="<?= $prod->descripcion ?>" required><br><br>

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" value="<?= $prod->precio ?>" required><br><br>

    <label>Marca</label>
    <select name="marca_id">
        <?php foreach ($marcas as $m): ?>
            <option value="<?= $m['id'] ?>" <?= $m['id'] == $prod->marca_id ? 'selected' : '' ?>>
                <?= $m['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Categoría</label>
    <select name="categoria_id">
        <?php foreach ($categorias as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $prod->categoria_id ? 'selected' : '' ?>>
                <?= $c['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Imagen (opcional)</label><br>
    <?php if ($prod->imagen): ?>
        <img src="<?= BASE_URL ?>assets/images/<?= $prod->imagen ?>" width="100"><br>
    <?php endif; ?>
    <input type="file" name="imagen"><br><br>

    <button type="submit">Actualizar Producto</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
