<?php
    session_start();
    //apaga essa variavel
    unset($_Session['id_usuario']);
    //retornar para a tela principal
    header("location:index.php");



?>