<?php
//verifica se a sessão existe
session_start();
if(!isset($_SESSION['id_usuario'])){
    header("location:index.php");
    exit;
}



?>

SEJA BEM-VINDO!
<a href="sair.php">SAIR</a>