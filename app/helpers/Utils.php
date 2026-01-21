<?php



class Utils{


       public static function isAdmin(){
           return isset($_SESSION['usuario']) && $_SESSION['usuario']->rol == 'admin';
       }
       public static function isLoggedIn(){
           return isset($_SESSION['usuario']);
       }
}