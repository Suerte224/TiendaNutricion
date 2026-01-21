<?php

class Marca{

    private $db;

    public function __construct(){
        $this->db = new Db();

    }

    public function listar(){
        $sql = "SELECT * FROM marcas ORDER BY nombre ASC";
        $stmt = $this->db->lanzar_consulta($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}