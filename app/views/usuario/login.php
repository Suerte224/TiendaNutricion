<?php
require_once __DIR__ . '/../layouts/header.php';

?>
<h2>Iniciar sesion</h2>

<?php if (isset($_SESSION['error_login'])) :?>
  <p style="color:red"<?=$_SESSION['error_login']?>></p>
<?php unset($_SESSION['error_login']);?>
<?php endif;?>

<form action="<?=BASE_URL?>?controller=Usuario&action=autenticar"method="post">
    <input type="email" name="email" placeholder="Email" required>
    <br><br>
    <input type="password" name="password" placeholder="" required>
    <br><br>
    <button type="submit">Entrar</button>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php';?>
