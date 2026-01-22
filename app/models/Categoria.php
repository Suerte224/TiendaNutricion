<?php


class Categoria{
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
          $sql = "SELECT * FROM categorias ORDER BY nombre";
          $stmt = $this->db->lanzar_consulta($sql);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);;
      }
      public function guardar(){
          $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
          return $this->db->lanzar_consulta($sql, ['nombre' => $this->nombre]);
      }
      public function eliminar(){
          $sql = "DELETE FROM categorias WHERE id = :id";
          return $this->db->lanzar_consulta($sql, ['id' => $this->id]);
      }
}