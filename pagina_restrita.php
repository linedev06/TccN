<?php
session_start(); // Iniciar a sessão

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['nm_nome'])) {
    // Se o usuário não estiver logado, redirecioná-lo para a página de login
    header("Location: index.php");
    exit; // Certifique-se de sair após o redirecionamento
}

// Verificar se o botão de logout foi clicado
if (isset($_POST['logout'])) {
    // Limpar a sessão
    session_unset();
    session_destroy();
    // Redirecionar para a página de login após o logout
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agiliza</title>
    <style>
        /* Estilos gerais */

        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f5ff; /* Azul claro */
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
        #conteudo1 {
            background-color: white;
            padding: 50px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #0074d9; /* Azul brilhante */
            font-size: 36px;
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
        img {
            max-width: 90%;
            height: auto;
        }
        footer {
            background-color: #0074d9; /* Azul brilhante */
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        footer a:hover {
            text-decoration: underline;
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
    <div id="conteudo1">
        <h1>Bem-vindo ao AGILIZA!</h1>
        <a href="cadastro2.php"><button>Realizar o cadastro</button></a>
        <a href="ver.php"><button>Ver o seu cadastro</button></a>
        <img src="doctors-animate.svg" alt="Imagem de médicos">
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>Contato</h3>
                <p>Email: contato@agiliza.com.br</p>
                <p>Telefone: (11) 1234-5678</p>
            </div>
            <div>
                <h3>Siga-nos</h3>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
            <div>
                <h3>© 2024 Agiliza</h3>
            </div>
        </div>
    </footer>
</body>
</html>