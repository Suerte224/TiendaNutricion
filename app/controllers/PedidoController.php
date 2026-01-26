<?php

require_once __DIR__ . '/../models/Pedido.php';
class PedidoController{
    public function index(){
        Utils::isAdminOrRedirect();
        $pedido = new Pedido();
        $pedidos = $pedido->listar();
        require_once __DIR__ ."/../views/Pedido/index.php";



    }
    public function confirmar()
    {
        if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
            header("Location:" . BASE_URL);
            exit;
        }

        // Generar PDF
        require_once __DIR__ . '/libs/generar_pdf.php';

        generarPDF($_SESSION['carrito']);

        // Vaciar carrito
        unset($_SESSION['carrito']);

        exit;
    }


}