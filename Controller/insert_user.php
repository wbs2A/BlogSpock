
<?php
    require_once 'BDClass.class.php';
    $db = bd::getInstance();

    if($_POST["username"]!="" and $_POST["data"]!="" and $_POST["email"]!="" and $_POST["senha"]!="" and $_POST["nivel"]!=""){
        $user = $db->prepareInsertUser($_POST["username"], $_POST["data"], $_POST["email"], md5($_POST["senha"]), $_POST["nivel"]);
        if($user != null){
            $_SESSION["nome"]=$user["user"];
            $_SESSION["email"]=$user["email"];
            $_SESSION["nivel"]=$db->selectNivel($user["acesso_id"])["nivel"];
            header('Location: ../View/login.php');
        }else{
            header('Location: ../View/home.php');
        }

    }
?>