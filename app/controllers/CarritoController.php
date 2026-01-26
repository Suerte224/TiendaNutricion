<?php

class CarritoController
{
    public function index()
    {
        require_once __DIR__ . '/../views/carrito/index.php';
    }

    public function add()
    {
        if (!isset($_GET['id'])) {
            header("Location:" . BASE_URL);
            exit;
        }

        $producto_id = (int) $_GET['id'];
        $cantidad = isset($_POST['cantidad']) ? (int) $_POST['cantidad'] : 1;

        // Cargar producto
        require_once __DIR__ . '/../models/Producto.php';
        $producto = new Producto();
        $producto->setId($producto_id);
        $prod = $producto->getOne();

        if (!$prod) {
            header("Location:" . BASE_URL);
            exit;
        }

        // Inicializar carrito
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Si ya existe, suma cantidad
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$producto_id] = [
                'producto_id' => $producto_id,
                'nombre'      => $prod->nombre,
                'precio'      => $prod->precio,
                'cantidad'    => $cantidad,
                'imagen'      => $prod->imagen
            ];
        }

        header("Location:" . BASE_URL . "?controller=Carrito&action=index");
        exit;
    }

    public function remove()
    {
        if (isset($_GET['id']) && isset($_SESSION['carrito'][$_GET['id']])) {
            unset($_SESSION['carrito'][$_GET['id']]);
        }

        header("Location:" . BASE_URL . "?controller=Carrito&action=index");
        exit;
    }
}
