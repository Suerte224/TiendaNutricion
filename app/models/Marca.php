<?php

class Marca{

    private $db;
    private $id;
    private $nombre;
    public function __construct(){
        $this->db = new Db();

    }
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function listar(){
        $sql = "SELECT * FROM marcas ORDER BY nombre ASC";
        $stmt = $this->db->lanzar_consulta($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function guardar(){
        $sql = "INSERT INTO marcas (nombre) VALUES (:nombre)";
        return $this->db->lanzar_consulta($sql, ['nombre' => $this->nombre]);
    }
    public function eliminar(){
        $sql = "DELETE FROM marcas WHERE id = :id";
        return $this->db->lanzar_consulta($sql, ['id' => $this->id]);
    }


}