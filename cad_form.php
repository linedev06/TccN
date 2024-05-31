<?php
include 'conecta.php';

if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['rg']) && !empty($_POST['dt_nasc'])) {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $dt_nasc = $_POST['dt_nasc'];

    try {
        $pdo->beginTransaction();

        $stmtCadastro = $pdo->prepare("INSERT INTO frm_cadastro (nm_nome, nr_cpf, nr_rg, dt_nasc) VALUES (:nome, :cpf, :rg, :dt_nasc)");
        $stmtCadastro->bindParam(':nome', $nome);
        $stmtCadastro->bindParam(':cpf', $cpf);
        $stmtCadastro->bindParam(':rg', $rg);
        $stmtCadastro->bindParam(':dt_nasc', $dt_nasc);
        $stmtCadastro->execute();

        $pdo->commit();
        // redirecionamento
        header("Location: pagina_restrita.php"); 
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
} else {
    echo "Todos os campos são obrigatórios!";
}
?>