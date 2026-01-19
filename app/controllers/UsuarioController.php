<?php

class UsuarioController{
    public function login(){
        require_once __DIR__ ."/../views/usuario/login.php";
    }

    public function autenticar()
    {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            header("Location: " . BASE_URL . "?controller=Usuario&action=login");
            exit;
        }
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usuario = new Usuario();
        $datos = $usuario->login($email, $password);

        if ($datos) {
            $_SESSION['usuario'] = $datos;
            header("Location: " . BASE_URL);

        } else {
            $_SESSION['error_login'] = "Login incorrecto, porfavor vuelva a intentarlo";
            header("Location: " . BASE_URL . "?controller=Usuario&action=login");
        }
    }
        public function logout(){
            session_destroy();
            header("Location: ". BASE_URL);
        }

}