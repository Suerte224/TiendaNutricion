<?php

class HomeController{

    public function index(){


        $categoria = new Categoria();
        $categorias = $categoria->listar();

        // paginacion

        $prod

        $producto = new Producto();
        $productos=$producto->listar()->fetchAll(PDO::FETCH_OBJ);
        require_once __DIR__ ."/../views/home/index.php";
    }

}