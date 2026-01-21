<?php
require_once __DIR__ ."/../layouts/header.php";
?>

<h2>Crear Producto</h2>

<form action="<?=BASE_URL?>?controller=Producto&action=guardar" method="post" enctype="multipart/form-data">
    <label>Nombre</label>
    <input type="text" name="nombre" required>
    <br><br>

    <label>Descripcion</label>
    <input type="text" name="descripcion" required>
    <br><br>

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" required>
    <br><br>

    <label>Stock</label>
    <input type="number" name="stock" required>
    <br><br>

    <label>Oferta</label>
    <select name="oferta">
        <option value="0">No</option>
        <option value="1">Si</option>
    </select>
    <br><br>

    <label>Marca</label><br>
    <select name="marca_id" required>
        <?php foreach ($marcas as $marca) : ?>
            <option value="<?= $marca['id'] ?>">
                <?= $marca['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <label>Categoría</label><br>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria['id'] ?>">
                <?= $categoria['nombre'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Subir Imagen</label>
    <input type="file" name="imagen">
    <br><br>

    <button type="submit">Guardar Producto</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php';?>