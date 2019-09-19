<?php
    session_start();
    if(!isset($_SESSION['id_prof']))
    {
        header("location: index.php");
        exit;
    }

?>

SEJA BEM VINDO!!

<a href="Sair.php"> Sair </a>