<?php
    function dump($data): void{
        echo "<pre>" . print_r($data, 1) . "</pre>";
    }
    function dd($data): never{
        dump($data);
        die;
    }
    function load(array $fillable, $post = true): array{
        $load_data = $post ? $_POST : $_GET;
        $data = [];
        foreach($fillable as $value){
            if(isset($load_data[$value])){
                $data[$value] = trim($load_data[$value]);
            } else{
                $data[$value] = "";
            }
        }
        return $data;
    }
    function check_required_filds(array $data){
        $errors = [];
        foreach($data as $key => $v){
            if(empty($v)){
                $errors[] = "Не заполнено поле $key";
            }
        }
        if(!$errors){
            return true;
        } else{
            return $errors;
        }
    }
    function h(string $s): string{
        return htmlspecialchars($s, ENT_QUOTES);
    }
    function old(string $name, $post = true): string{
        $load_data = $post ? $_POST : $_GET;
        return isset($load_data[$name]) ? h($load_data[$name]) : "";
    }
    function redirect(string $url){
        header("Location: $url");
        die;
    }
    function get_errors(array $errors): string{
        $html = "<ul class='list-unstyled'>";
        foreach($errors as $err){
            $html .= "<li>$err</li>";
        }
        $html .= "</ul>";
        return $html;
    }
    function get_alerts(): void{
        if(!empty($_SESSION["errors"])){
            require VIEWS . "/incs/alert_danger.tpl.php";
            unset($_SESSION["errors"]);
        }
        if(!empty($_SESSION["success"])){
            require VIEWS . "/incs/alert_success.tpl.php";
            unset($_SESSION["success"]);
        }
    }
    function register(array $data): bool{
        global $db;
        $stmt = $db->prepare("SELECT COUNT(*) FROM Users WHERE email = ?");
        $stmt->execute([$data["email"],]);
        if($stmt->fetchColumn()){
            $_SESSION["errors"] = "This email is already taken!";
            return false;
        }
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO Users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute($data);
        $_SESSION["success"] = "You have successfully registered!";
        return true;
    }
?>