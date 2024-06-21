<?php

$dsn = 'mysql:host=agilizabanco.mysql.database.azure.com;dbname=bd_site';
$username = 'Ricardo';
$password = 'Arcanjo6669';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit();
}
?>
