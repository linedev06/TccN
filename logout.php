<?php
session_start();

$_SESSION = array();

// se qser destruir a sessão descomenta a linha abaixo
// session_destroy();

header("Location: index.php");
exit; 
?>