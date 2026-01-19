<?php

class HomeController{

    public function index(){


        $categoria = new Categoria();
        $categorias = $categoria->listar();

        $producto = new Producto();
        $productos=$producto->listar();
        require_once __DIR__ ."/../views/home/index.php";
    }

}