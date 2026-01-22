<?php

class CategoriaController{

    public function index(){
        Utils::isAdminOrRedirect();

        $categoria = new Categoria();
        $categoria = $categoria->listar();
        require_once __DIR__ ."/../views/categoria/index.php";
    }
    public function crear() {
        Utils::isAdminorRedirect();;
            require_once __DIR__ . "/../views/categoria/crear.php";
    }
    public function guardar(){
        Utils::isAdminOrRedirect();
        if(isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->guardar();
        }
        header("Location: ". BASE_URL . "?controller=Categoria&action=index");
    }
    public function eliminar(){
        Utils::isAdminOrRedirect();
        if(isset($_GET['id'])){
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $categoria->eliminar();
        }
        header("Location: ". BASE_URL . "?controller=Categoria&action=index");
    }

}