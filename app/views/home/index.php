<?php

?>




<?php require_once __DIR__ ."/../layouts/header.php";?>
<div style="display:flex;">
    <aside style="width: 20%">
        <?php require_once __DIR__ ."/../layouts/sidebar.php";?>
    </aside>
    <main style="width: 80%">
        <h1>Productos</h1>
        <?php foreach ($productos as $prod) : ?>
            <div style="border:1px solid #ccc; margin:10px; padding:10px;">
                <h3><?= $prod->nombre?></h3>
                <p><?= $prod->descripcion ?></p>
                <strong><?= $prod->precio ?> €</strong>
            </div>
        <?php endforeach; ?>
    </main>

</div>

