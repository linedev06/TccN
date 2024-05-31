<?php
include 'conecta.php';

if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['rg']) && !empty($_POST['dt_nasc']) && !empty($_POST['endereco']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['senha'])) {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $dt_nasc = $_POST['dt_nasc'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

   
    $imagem = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemTmpPath = $_FILES['imagem']['tmp_name'];
        $imagemName = $_FILES['imagem']['name'];
        $imagemSize = $_FILES['imagem']['size'];
        $imagemType = $_FILES['imagem']['type'];
        $imagemExt = strtolower(pathinfo($imagemName, PATHINFO_EXTENSION));

        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imagemExt, $validExtensions)) {
            $newFileName = md5(time() . $imagemName) . '.' . $imagemExt;
            $destPath = 'uploads/' . $newFileName;

            if (move_uploaded_file($imagemTmpPath, $destPath)) {
                $imagem = $newFileName;
            }
        }
    }

    try {
        $pdo->beginTransaction();

        $stmtPaciente = $pdo->prepare("INSERT INTO tb_paciente (nm_nome, nm_senha, nr_cpf, nr_rg, dt_nasc, nm_endereco, nm_bairro, nm_cidade, nm_email, nr_telefone, imagem) VALUES (:nome, :senha, :cpf, :rg, :dt_nasc, :endereco, :bairro, :cidade, :email, :telefone, :imagem)");
        $stmtPaciente->bindParam(':nome', $nome);
        $stmtPaciente->bindParam(':senha', $senha);
        $stmtPaciente->bindParam(':cpf', $cpf);
        $stmtPaciente->bindParam(':rg', $rg);
        $stmtPaciente->bindParam(':dt_nasc', $dt_nasc);
        $stmtPaciente->bindParam(':endereco', $endereco);
        $stmtPaciente->bindParam(':bairro', $bairro);
        $stmtPaciente->bindParam(':cidade', $cidade);
        $stmtPaciente->bindParam(':email', $email);
        $stmtPaciente->bindParam(':telefone', $telefone);
        $stmtPaciente->bindParam(':imagem', $imagem);
        $stmtPaciente->execute();

      
        $id_usuario = $pdo->lastInsertId();
        $_SESSION['usuario'] = array(
            'id_usuario' => $id_usuario,
            'nome' => $nome,
            
        );

        $pdo->commit();
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