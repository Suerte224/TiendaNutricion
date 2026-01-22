<?php require_once __DIR__ . '/../layouts/header.php';?>

<h1>Gestionar Categorias</h1>


<a href="<?=BASE_URL?>?controller=Categoria&action=crear">
     + Añadir categoria
</a>

<ul>
    <?php foreach($categoria as $categori):?>
        <li>
            <?= $categori['nombre']?>

         |
        <a href="<?=BASE_URL?>?controller=Categoria&action=eliminar&id=<?=$categori['id']?>">
            Eliminar
        </a>
        </li>
    <?php endforeach;?>
</ul>
<?php require_once __DIR__ . '/../layouts/footer.php';?>