<?php
session_start();

// verificando a sessão meu mano vitor
if (!isset($_SESSION['usuario'])) {
    // se nao tiver logado, pagina de login
    header("Location: index.php");
    exit; // sair
}

include 'conecta.php';

if(isset($_SESSION['usuario'])) {
    $cod = $_SESSION['usuario'];
  }


$stmt = $pdo->prepare("SELECT * FROM tb_paciente WHERE id_paciente = :id_paciente");
$stmt->bindParam(':id_paciente', $cod);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuário não encontrado!";
    exit;
}


include 'conecta.php';

$stmt = $pdo->query("SELECT * FROM frm_cadastro WHERE id_cadastro = $cod");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .dados {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .dados:last-child {
            border-bottom: none;
        }
        .dados p {
            margin: 5px 0;
        }
        .dados form {
            margin-top: 10px;
        }
        .dados button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease; /* Transição suave */
        }
        .dados button:hover {
            background-color: #0056b3;
        }
        .return-button {
            display: block;
            margin: 20px 0;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .return-button a {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .return-button a:hover {
            background-color: #218838;
        }
        /* Estilo para o formulário de pesquisa */
        .container form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .container input[type="text"] {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: background-color 0.3s ease; /* Transição suave */
        }

        .container button[type="submit"],
        .container a.cancel-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease; /* Transição suave */
            
        }

        .container button[type="submit"]:hover,
        .container a.cancel-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Seu Cadastro</h2>

    <!-- Formulário de pesquisa -->
    <form action="" method="GET" class="container">
        <input type="text" name="pesquisa" placeholder="Digite o nome, CPF ou RG" value="<?php echo isset($_GET['pesquisa']) ? $_GET['pesquisa'] : ''; ?>">
        <button type="submit">Pesquisar</button>
        
        <a href="ver.php" class="cancel-button">Cancelar</a>
    </form>

    <div id="conteudo" class="container">
       
        <?php foreach ($dados as $dado): ?>
           
            <?php 
                $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
                $nome = $dado['nm_nome'];
                $cpf = $dado['nr_cpf'];
                $rg = $dado['nr_rg'];
                if (stripos($nome, $pesquisa) !== false || stripos($cpf, $pesquisa) !== false || stripos($rg, $pesquisa) !== false):
            ?>
                <div class="dados">
                    <p><strong>Nome:</strong> <?php echo "$nome"; ?></p>
                    <p><strong>CPF:</strong> <?php echo $cpf; ?></p>
                    <p><strong>RG:</strong> <?php echo $rg; ?></p>
                    <p><strong>Data de Nascimento:</strong> <?php echo $dado['dt_nasc']; ?></p>
                    <form action="gerar_pdf.php" method="post" target="_blank">
                        <input type="hidden" name="id_cadastro" value="<?php echo $dado['id_cadastro']; ?>">
                        <button type="submit">Baixar PDF</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div class="return-button">
        <a href="pagina_restrita.php">Retornar</a>
    </div>
</body>
</html>