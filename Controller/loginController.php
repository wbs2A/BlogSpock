<?php
    require_once 'BDClass.class.php';
    $db = bd::getInstance();

    if($_POST["username"]!="" and $_POST["passw"]!=""){
        $user = $db->selectUser($_POST["username"],md5($_POST["passw"]));
        if($user != null){
            $_SESSION["nome"]=$user["user"];
            $_SESSION["email"]=$user["email"];
            $_SESSION["nivel"]=$db->selectNivel($user["acesso_id"])["nivel"];
            header('Location: display.php');
        }else{
            var_dump($user);
            #header('Location: home.php');
        }

    }