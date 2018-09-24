<?php
    require_once 'BDClass.class.php';
    session_start();
    $db = bd::getInstance();

    if($_POST["username"]!="" and $_POST["passw"]!=""){
        $user = $db->getUser($_POST["username"],md5($_POST["passw"]));
        if($user != null){
            $_SESSION["nome"]=$user["nome"];
            $_SESSION["email"]=$user["email"];
            $_SESSION["nivel"]=$db->selectNivel($user["acesso_idAcesso"])["nivel"];
            header('Location: ../View/home.php');
        }else{
            var_dump($user);
            #header('Location: home.php');
        }

    }