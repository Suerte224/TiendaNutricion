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
        $productos = $producto->listarPorCategoria($categoria_id)
        ->fetchAll(PDO::FETCH_OBJ);


        require_once __DIR__ ."/../views/producto/categoria.php";
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
        $productos = $producto->buscar($texto)->fetchAll(PDO::FETCH_OBJ);

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
    public function editar(){
        if(!Utils::isAdmin()){
            header("Location: ". BASE_URL);
            exit;
        }
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();

            $marca = new Marca();
            $categoria = new Categoria();

            $marcas = $marca->listar();
            $categorias = $categoria->listar();

            require_once __DIR__ ."/../views/producto/editar.php";

        }else{
            header("Location: ". BASE_URL);
        }
    }
    public function actualizar(){
        if(!Utils::isAdmin()){
            header("Location: ". BASE_URL);
            exit;
        }
        if($_POST){
            $producto = new Producto();
            $producto->setId($_POST['id']);
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setPrecio($_POST['precio']);
            $producto->setMarcaId($_POST['marca_id']);
            $producto->setCategoriaId($_POST['categoria_id']);

            if (isset($_FILES['imagen']) && $_FILES['imagen']['name'] != '') {
                $imagen = time() . '_' . $_FILES['imagen']['name'];
                $ruta = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $imagen;

                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                $producto->setImagen($imagen);
        }else {
            $producto->setImagen($_POST['imagen_actual']);}
        }
        $producto->actualizar();
        header("Location: ". BASE_URL);


    }
    public function eliminar(){
        if(!Utils::isAdmin()){
            header("Location: ". BASE_URL);
            exit;
        }

        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];


            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
             // para borrar la imagen del server
            if($prod && $prod->imagen){
                $ruta = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $prod->imagen;
                if(file_exists($ruta)){
                    unlink($ruta);
                }
            }

            $producto->eliminar();

        }
        header("Location: ". BASE_URL);
    }
  public function ver(){
        if(!isset($_GET['id'])){
            header("Location: ". BASE_URL);
            exit;
        }
        $id = (int)$_GET['id'];
// Sidebar categorías
      $categoria = new Categoria();
      $categorias = $categoria->listar();

      // Producto
      $producto = new Producto();
      $producto->setId($id);
      $prod = $producto->getOne();

      if(!$prod){
          header("Location: ".BASE_URL);
          exit;
      }

      require_once __DIR__."/../views/producto/ver.php";

  }


}