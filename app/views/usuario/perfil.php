<?php require_once __DIR__ . '/../layouts/header.php';?>

<h1>Mi cuenta</h1>

<p><strong>Nombre:</strong><?=$_SESSION['usuario']->nombre?></p>
<p><strong>Email:</strong><?=$_SESSION['usuario']->email?></p>

<a href="#">Mis pedidos</a>

<?php require_once __DIR__ . '/../layouts/footer.php';?>