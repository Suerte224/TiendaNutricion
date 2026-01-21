<?php

class Db{
    private $conexion;

    public function __construct(){
        $this->conexion();
    }
   public function conexion(){
        try{
          $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
          $this->conexion = new PDO($dns, DB_USER, DB_PASS);
          $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }catch (PDOException $e){
            echo "Error de conexion: " .$e->getMessage();
            exit();
       }
   }

   public function lanzar_consulta($sql, $parametros = array()){
       $consulta = $this->conexion->prepare($sql);
       $consulta->execute($parametros);
       return $consulta;
   }




}
