<?php


class Categoria{
      private $db;

      public function __construct(){
          $this->db = new Db();
      }
      public function listar(){
          $sql = "SELECT * FROM categorias ORDER BY nombre";
          $stmt = $this->db->lanzar_consulta($sql);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
}