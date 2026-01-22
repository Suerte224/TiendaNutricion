<?php

class Pedido{

    private $db;

    public function __construct(){
        $this->db = new Db();
    }
    public function listar(){
        $sql = "SELECT * FROM pedidos ORDER BY fecha DESC";
        $stmt = $this->db->lanzar_consulta($sql);
        return $stmt->fetchAll();
    }

}