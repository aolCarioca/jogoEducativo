<?php
session_start();
unset($_SESSION['id_prof']);
header("Location: index.php");

?>