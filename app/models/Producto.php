<?php



class Producto{
    private $db;

    public function __construct(){
        $this->db = new Db();
    }

    public function listar(){
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        return $this->db->lanzar_consulta($sql);
    }


    public function listarPorCategoria($categoria_id){
        $categoria_id = (int)$categoria_id;

          $sql ="SELECT * FROM productos WHERE 
                            categoria_id = $categoria_id
                            ORDER BY id DESC";
            return $this->db->lanzar_consulta($sql);
    }
    public function buscar($texto){
        $texto = "%$texto%";
        $sql = "SELECT * FROM productos WHERE nombre LIKE ? ORDER BY id DESC";
        return $this->db->lanzar_consulta($sql, array($texto));
    }


}