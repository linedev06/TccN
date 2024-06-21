<?php
session_start();
include 'conecta.php';

$error_message = ""; // Inicializa a mensagem de erro como vazia

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM tb_paciente WHERE nm_email = :email AND nm_senha = :senha");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario; // aq é conexao com a sessão
        header("Location: pagina_restrita.php"); 
        exit();
    } else {
        $error_message = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PW - Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            overflow-x: hidden;
            overflow-y: hidden;
        }


        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            border: 4px solid #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #666;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            margin-top: 10px;
            text-align: center;
            color: red;
            font-weight: bold;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        img{
            width: 500px;
            height: 500px;
            margin-top: 20px;
        }

        .logo{
            justify-content: center;
            align-items: center;
        }

        .logo img{
            margin-left: 110px;
            width: 200px;
            height: 200px;
        }

@media (max-height: 876px), (max-width: 400px) {
    #lado {
        display: none;
    }
}

/* Mostrar a imagem em telas maiores que 400px de largura ou maiores que 876px de altura */
@media (min-width: 401px), (min-height: 877px) {
    #lado {
        display: block; /* ou flex, conforme necessário */
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
        <img src="Image-removebg-preview.png" alt="Logo AGILIZA">
        </div>
        <h1>Bem-vindo ao AGILIZA!</h1>
        <form action="index.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <button type="submit">Entrar</button>
            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
        <p>Não tem uma conta? <a href="cadastro.php">Cadastrar-se</a></p>
    </div>

   <img id="lado" src="./svg/login-animate.svg" alt="My Happy SVG"/>
    
</body>
</html>

