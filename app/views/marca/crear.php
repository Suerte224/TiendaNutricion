<?php
require_once __DIR__ . '/../layouts/header.php';?>

<h1>Crear Categoria</h1>

<form action="<?=BASE_URL?>?controller=Categoria&action=guardar" method="post">
    <label>Nombre</label>
    <input type="text" name="nombre" required>
    <br><br>

    <button type="submit">Guardar</button>
</form>
<?php require_once __DIR__ . '/../layouts/footer.php';?>
