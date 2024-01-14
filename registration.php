<?php
    $title = "Registration";
    session_start();
    require_once __DIR__ . "/incs/config.php";
    require_once ROOT . "/incs/dataBase.php";
    require_once ROOT . "/incs/functions.php";
    var_dump($db);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $data = load(["name", "email", "password"]);
        if(true === $validate = check_required_filds($data)){
            if(register($data)){
                redirect("login.php");
            }
        } else{
            $_SESSION["errors"] = get_errors($validate);
        }
    }
    require_once VIEWS . "/register.tpl.php";
?>