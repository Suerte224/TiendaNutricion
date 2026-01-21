<?php
require __DIR__ . "/../layouts/header.php";

?>
<h2>Registro de usuario</h2>

<?php if (isset($_SESSION['error_registro'])) :?>
<p stlye="color:red"><?=$_SESSION['error_registro']?></p>
   <?php unset($_SESSION['error_registro']);?>
<?php endif;?>

<form action="<?=BASE_URL?>?controller=Usuario&action=guardar" method="post">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <br><br>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <br><br>
    <input type="text" name="email" placeholder="Email" required>
    <br><br>
    <input type="password" name="password" placeholder="" required>
    <br><br>
    <input type="submit" value="Registrar">
</form>
<?php require_once __DIR__ . '/../layouts/footer.php';?>