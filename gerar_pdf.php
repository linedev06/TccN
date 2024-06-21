<?php
include 'conecta.php';
require_once 'tcpdf/tcpdf.php';

// Verifica se o id_cadastro foi enviado via POST
if (isset($_POST['id_cadastro'])) {
    $id_cadastro = $_POST['id_cadastro'];

    // Consulta ao banco de dados para obter os dados do registro específico
    $stmt = $pdo->prepare("SELECT * FROM frm_cadastro WHERE id_cadastro = ?");
    $stmt->execute([$id_cadastro]);
    $dado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($dado) {
        // Inicializa o objeto PDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Adiciona uma página
        $pdf->AddPage();

        // Define o conteúdo HTML
        $html = '<h2>Dados do Cadastro</h2>';
        $html .= '<p><strong>Nome:</strong> ' . $dado['nm_nome'] . '</p>';
        $html .= '<p><strong>CPF:</strong> ' . $dado['nr_cpf'] . '</p>';
        $html .= '<p><strong>RG:</strong> ' . $dado['nr_rg'] . '</p>';
        $html .= '<p><strong>Data de Nascimento:</strong> ' . $dado['dt_nasc'] . '</p>';

        // Escreve o conteúdo HTML no PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Gera o conteúdo para o QR Code
        $qrContent = "Nome: " . $dado['nm_nome'] . "\n" .
                     "CPF: " . $dado['nr_cpf'] . "\n" .
                     "RG: " . $dado['nr_rg'] . "\n" .
                     "Data de Nascimento: " . $dado['dt_nasc'];

        // Adiciona o QR Code ao PDF
        $pdf->write2DBarcode($qrContent, 'QRCODE,H', 150, 50, 50, 50, array('border' => 2, 'align' => 'C'), 'N');

        // Nome do arquivo PDF para download
        $filename = 'cadastro_' . $dado['id_cadastro'] . '.pdf';

        // Saída do PDF para o navegador (download)
        $pdf->Output($filename, 'I');
    } else {
        echo 'Registro não encontrado.';
    }
} else {
    echo 'Código do registro não fornecido / Sem permissão do administrador.';
}
?>
