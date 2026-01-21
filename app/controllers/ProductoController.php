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
    public function crear(){
        if(!Utils::isAdmin()){
            header("Location: ". BASE_URL);
            exit;
        }
        $marca = new Marca();
        $categoria = new Categoria();

        $marcas = $marca->listar();
        $categorias = $categoria->listar();
        require_once __DIR__ ."/../views/producto/crear.php";
    }
    public function guardar(){
        if(!Utils::isAdmin()){
            header("Location: ". BASE_URL);
            exit;

        }
        if($_POST){
            $producto = new Producto();


            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setPrecio($_POST['precio']);
            $producto->setOferta($_POST['oferta']);
            $producto->setMarcaId($_POST['marca_id']);
            $producto->setCategoriaId($_POST['categoria_id']);
            $producto->setFecha(date('Y-m-d'));



            if (isset($_FILES['imagen']) && $_FILES['imagen']['name'] != '') {
                $imagen = time() . '_' . $_FILES['imagen']['name'];
                $ruta = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $imagen;

                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                $producto->setImagen($imagen);
            }

            $producto->guardar();
        }
        header("Location: ". BASE_URL);
    }
}