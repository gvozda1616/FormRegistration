<?php
    $title = "Home";
    session_start();
    require_once __DIR__ . "/incs/config.php";
    require_once ROOT . "/incs/dataBase.php";
    require_once ROOT . "/incs/functions.php";
    require_once VIEWS . "/index.tpl.php";
?>