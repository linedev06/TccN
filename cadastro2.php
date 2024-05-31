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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGILIZA - Cadastro de Usuário</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        form fieldset {
            border: none;
            margin-bottom: 20px;
        }

        form legend {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="email"],
        form input[type="tel"],
        form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h1>AGILIZA - Formulário de Cadastro</h1>

        <form id="userRegistrationForm" action="cad_form.php" method="post">
            <fieldset>
                <legend>Informações Pessoais</legend>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Insira seu nome" required>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Insira seu CPF" required>
                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" placeholder="Insira seu RG" required>
                <label for="dt_nasc">Data de Nascimento:</label>
                <input type="date" id="dt_nasc" name="dt_nasc" required>
            </fieldset>
            <button type="submit" id="register">Registrar</button>
        </form>
    </div>
</div>
</body>
</html>