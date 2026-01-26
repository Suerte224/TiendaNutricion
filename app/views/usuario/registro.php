<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<style>
    .auth-page {
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: center;
        justify-content: center;
        background: url("public/assets/images/a3.jpeg") center / cover no-repeat;
    }

    .auth-card {
        background: rgba(255, 255, 255, 0.13);
        width: 100%;
        max-width: 420px;
        padding: 40px;
        border-radius: 18px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    }

    .auth-card h2 {
        text-align: center;
        margin-bottom: 25px;
    }

    .auth-group {
        margin-bottom: 18px;
    }

    .auth-group input {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        border: 1px solid #ddd;
    }

    .auth-btn {
        width: 100%;
        padding: 14px;
        border-radius: 30px;
        background: #000;
        color: #fff;
        border: none;
    }

    .auth-btn:hover {
        background: #e10600;
    }

    .auth-error {
        background: #ffe5e5;
        color: #b30000;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 15px;
        text-align: center;
    }
</style>
<div class="auth-page">

    <div class="auth-card">
        <h2>Crear cuenta</h2>

        <?php if (isset($_SESSION['error_registro'])): ?>
            <p class="auth-error"><?= $_SESSION['error_registro'] ?></p>
            <?php unset($_SESSION['error_registro']); ?>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>?controller=Usuario&action=guardar" method="post">

            <div class="auth-group">
                <input type="text" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="auth-group">
                <input type="text" name="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="auth-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="auth-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="auth-btn">
                Registrarse
            </button>

        </form>
    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
