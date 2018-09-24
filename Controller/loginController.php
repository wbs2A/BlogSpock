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
            echo "<script> alert('Login efetuado com sucesso! :D') </script>";
            header('refresh:.001 url=../View/home.php');
        }else{
            echo "<script> alert('Não foi possível acessar...\\n Usuário ou Senha incorreto. :/') </script>";
            header('refresh:.001 url=../View/login.php');
        }

    }