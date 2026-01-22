<?php

class MarcaController{
    public function index(){
        Utils::isAdminOrRedirect();

        $marca = new Marca();
        $marcas = $marca->listar();
        require_once __DIR__ ."/../views/marca/index.php";


    }

    public function crear() {
        Utils::isAdminOrRedirect();;
        require_once __DIR__ . "/../views/marca/crear.php";
    }
    public function guardar(){
        Utils::isAdminOrRedirect();
        if(isset($_POST['nombre'])){
            $marca = new Marca();
            $marca->setNombre($_POST['nombre']);
            $marca->guardar();
        }
        header("Location: ". BASE_URL . "?controller=Marca&action=index");
    }
    public function eliminar(){
        Utils::isAdminOrRedirect();
        if(isset($_GET['id'])){
            $marca = new Marca();
            $marca->setId($_GET['id']);
            $marca->eliminar();
        }
        header("Location: ". BASE_URL . "?controller=Marca&action=index");
    }

}