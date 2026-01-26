<?php

class HomeController{

    public function index(){


        $categoria = new Categoria();
        $categorias = $categoria->listar();

        $producto = new Producto();

        // paginacion

        $destacados = $producto->destacados(4);

        $ofertas = $producto->ofertas(4);


        $productosPorPagina = 8;

        $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if($pagina < 1 ) $pagina = 1;

        $offset = ($pagina - 1) * $productosPorPagina;



        $totalProductos = $producto->contarTodos();
        $totalPaginas = ceil($totalProductos / $productosPorPagina);

        $productos=$producto->listarPaginados($offset,$productosPorPagina);


        require_once __DIR__ ."/../views/home/index.php";
    }

}