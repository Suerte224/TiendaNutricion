<?php

class PedidoController{
    public function index(){
        Utils::isAdminOrRedirect();
        $pedido = new Pedido();
        $pedidos = $pedido->listar();
        require_once __DIR__ ."/../views/Pedido/index.php";



    }


}