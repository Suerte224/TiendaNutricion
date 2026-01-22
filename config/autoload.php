<?php

require_once __DIR__ . "/config.php";
require_once __DIR__ . "/Db.php";

// 3️⃣ DESPUÉS autoload de modelos y controladores
spl_autoload_register(function ($class) {

    $root = dirname(__DIR__);
    $helper = $root . "/app/helpers/" . $class . ".php";

    $controller = $root . "/app/controllers/" . $class . ".php";
    $model      = $root . "/app/models/" . $class . ".php";

    if (file_exists($controller)) {
        require_once $controller;
        return;
    }

    if (file_exists($model)) {
        require_once $model;
        return;
    }
    if (file_exists($helper)) {
        require_once $helper;
        return;
    }
});
