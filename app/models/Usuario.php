<?php

class Usuario{

    private $db;

    public function __construct(){
        $this->db = new Db();
    }

    public function listar(){
        $sql = "SELECT * FROM usuarios ORDER BY nombre ASC";
        return $this->db->lanzar_consulta($sql);
    }
    public function guardar($nombre, $apellidos, $email, $password){
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (?,?,?,?)";
        return $this->db->lanzar_consulta($sql, array($nombre, $apellidos, $email, $password));
    }

    public function login($email, $password){
        $email = addslashes($email);
        $password = addslashes($password);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
        $stmt = $this->db->lanzar_consulta($sql);
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);
        return $usuario ? $usuario : false;
    }

}