<?php



class Utils{

       public static function isAdmin(){
           return isset($_SESSION['usuario']) && $_SESSION['usuario']->rol == 'admin';
       }
       public static function isLoggedIn(){
           return isset($_SESSION['usuario']);
       }
    public static function isAdminOrRedirect() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->rol !== 'admin') {
            header("Location:" . BASE_URL);
            exit;
        }
    }

}