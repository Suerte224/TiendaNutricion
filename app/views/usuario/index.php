<?php
?>
<h2>Usuarios</h2>


<table border="1" cellpadding="5">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
    </tr>

    <?php foreach ($usuarios as $usuario) : ?>
    <tr>
        <td><?= $usuario->nombre ?></td>
        <td><?= $usuario->email ?></td>
        <td><?= $usuario->rol ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<li>
    <a href="<?=BASE_URL?>?controller=Usuario&action=index">
        Gestionar Usuarios
    </a>
</li>
