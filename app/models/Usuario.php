<?php

class Usuario{

    private $db;

    public function __construct(){
        $this->db = new Db();
    }

    public function login($email, $password){
        $email = addslashes($email);
        $password = addslashes($password);
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
        $resultado = $this->db->lanzar_consulta($sql);
        return count($resultado)=== 1 ? $resultado[0]:false;
    }

}