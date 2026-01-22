<?php

class UsuarioController{



    public function index(){
        Utils::isAdminOrRedirect();
        $usuario = new Usuario();
        $usuarios = $usuario->listar();
        require_once __DIR__ ."/../views/usuario/index.php";
    }

    public function registro(){
        require_once __DIR__ ."/../views/usuario/registro.php";

    }
    public function guardar(){
        if(!isset($_POST['nombre']) || !isset($_POST['email']) || !isset($_POST['password'])){
            header("Location: ". BASE_URL . "?controller=Usuario&action=registro");
            exit;
        }
        $usuario = new Usuario();
        $resultado = $usuario->guardar(
            $_POST['nombre'],
            $_POST['apellidos'],
            $_POST['email'],
            $_POST['password']
        );
        if($resultado){
            header("Location: ". BASE_URL . "?controller=Usuario&action=login");
        }else{
            $_SESSION['error_registro'] = "Error al registrar al usuario";
            header("Location: ". BASE_URL . "?controller=Usuario&action=registro");
        }
    }
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
        public function perfil(){
        if(!isset($_SESSION['usuario'])){
            header("Location: ". BASE_URL);
            exit;
        }
        require_once __DIR__ ."/../views/usuario/perfil.php";
        }

}