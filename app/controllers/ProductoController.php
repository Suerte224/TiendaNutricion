<?php

class ProductoController{

    public function porCategoria(){
        if(!isset($_GET['id'])){
            header("Location: ". BASE_URL);
            exit;
        }

        $categoria_id = (int)$_GET['id'];
        $categoria = new Categoria();
        $categorias = $categoria->listar();

        $producto = new Producto();
        $productos = $producto->listarPorCategoria($_GET['id']);


        require_once __DIR__ ."/../views/home/index.php";
    }
    public function buscar() {
        if(!isset($_GET['q'])){
            header("Location: ". BASE_URL);
            exit;
        }
        $texto = trim($_GET['q']);
        // Categorías (sidebar)
        $categoria = new Categoria();
        $categorias = $categoria->listar();

        // Productos buscados
        $producto = new Producto();
        $productos = $producto->buscar($texto);

        require_once __DIR__ . '/../views/home/index.php';


    }
}