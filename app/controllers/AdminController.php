<?php

class AdminController{

    public function index(){
        if (!Utils::isAdmin()) {
            header("Location: ". BASE_URL);
            exit;
        }
        require_once __DIR__ ."/../views/admin/index.php";
    }
}