<?php

session_start();

require_once __DIR__ . '/../config/autoload.php';

$controller = $_GET['controller'] ?? 'Home';
$action = $_GET['action'] ?? 'index';

$controllerName = $controller . 'Controller';

if (!class_exists($controllerName)) {
    die("El controlador $controllerName no existe");
}

$controllerObject = new $controllerName();

if (!method_exists($controllerObject, $action)) {
    die("La acción $action no existe");
}

$controllerObject->$action();
