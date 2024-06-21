<?php
session_start();

// verificando a sessão meu mano vitor
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id_paciente'])) {
    // se nao tiver logado, pagina de login
    header("Location: index.php");
    exit; // sair
}

include 'conecta.php';

$id_paciente = $_SESSION['usuario']['id_paciente'];

$stmt = $pdo->prepare("SELECT * FROM tb_paciente WHERE id_paciente = :id_paciente");
$stmt->bindParam(':id_paciente', $id_paciente);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuário não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style> 

@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #0074d9; /* Azul brilhante */
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar img {
            max-width: 100px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #0074d9; /* Azul brilhante */
            font-size: 18px;
            color: white;
            border: none;
            margin: 10px;
            padding: 16px 28px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transição suave */
        }
        button:hover {
            background-color: #005ea6; /* Azul escuro */
        }

        .content {
            margin: 20px;
        }

        .user-info {
            border: 2px solid #007bff;
            border-radius: 10px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 10px 0;
        }

        .user-info img {
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style> 
</head>
<body>
    <div class="navbar">
        <img src="Image-removebg-preview.png" alt="Logo Agiliza">
        <a href="pagina_restrita.php">Home</a>
        <a href="sobre.php">Sobre</a>
        <form method="post" action="">
            <button type="submit" name="logout">Logout</button>
        </form>
        <a href="perfil.php"><img src="img/perfil_2.png" alt="Perfil" style="width:50px;"></a>
    </div>

    <div class="content">
        <div class="user-info">
            <p><strong>Nome:</strong> <?= htmlspecialchars($usuario['nm_nome']) ?></p>
            <p><strong>CPF:</strong> <?= htmlspecialchars($usuario['nr_cpf']) ?></p>
            <p><strong>RG:</strong> <?= htmlspecialchars($usuario['nr_rg']) ?></p>
            <p><strong>Data de nascimento:</strong> <?= htmlspecialchars($usuario['dt_nasc']) ?></p>
            <p><strong>Endereço:</strong> <?= htmlspecialchars($usuario['nm_endereco']) ?></p>
            <p><strong>Bairro:</strong> <?= htmlspecialchars($usuario['nm_bairro']) ?></p>
            <p><strong>Cidade:</strong> <?= htmlspecialchars($usuario['nm_cidade']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($usuario['nm_email']) ?></p>
            <p><strong>Telefone:</strong> <?= htmlspecialchars($usuario['nr_telefone']) ?></p>
            <?php if ($usuario['imagem']): ?>
                <img src="uploads/<?= htmlspecialchars($usuario['imagem']) ?>" alt="Imagem de Perfil" style="width: 100px; height: 100px;">
            <?php else: ?>
                <p>Imagem de Perfil: Não disponível</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
