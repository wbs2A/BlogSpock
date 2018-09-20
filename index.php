<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0; /* Erro caso login não for validado */
    session_start();
    if(!isset($_COOKIE["BlogSpock"]))
        setcookie("BlogSpock", "", time()+172800);
    header("location:View/home.php");
?>