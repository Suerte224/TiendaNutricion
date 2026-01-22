<?php require_once __DIR__ . '/../layouts/header.php';?>

    <h1>Gestionar Marca</h1>


    <a href="<?=BASE_URL?>?controller=Marca&action=crear">
        + Añadir Marca
    </a>

    <ul>
        <?php foreach($marcas as $marca):?>
            <li>
                <?= $marca['nombre']?>

                |
                <a href="<?=BASE_URL?>?controller=Categoria&action=eliminar&id=<?=$marca['id']?>">
                    Eliminar
                </a>
            </li>
        <?php endforeach;?>
    </ul>
<?php require_once __DIR__ . '/../layouts/footer.php';?>