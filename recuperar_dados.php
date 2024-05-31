<?php
include 'conecta.php';

$sql = "SELECT * FROM frm_cadastro";


$stmt = $pdo->query($sql);

$dados = array();

if ($stmt) {
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dados[] = $row;
    }
}

echo json_encode($dados);
?>