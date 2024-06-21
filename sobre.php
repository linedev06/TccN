
<?php
session_start();

// verificando a sessão meu mano vitor
if (!isset($_SESSION['usuario'])) {
    // se nao tiver logado, pagina de login
    header("Location: index.php");
    exit; // sair
}

include 'conecta.php';

$id_paciente = $_SESSION['usuario'];

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
    <title>Agiliza - Sobre Nós</title>
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

        .container {
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
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
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
         
        </form>
        <a href="perfil.php"><img src="img/perfil_2.png" alt="Perfil" style="width:50px;"></a>
    </div>
    </div>
    <div style="height: 30px;"></div>
    <div class="container">
        <h1>Sobre Nós</h1>
        <p>O Agiliza é uma empresa dedicada a fornecer soluções rápidas e eficientes para nossos clientes.</p>
        <p>Nossa missão é facilitar o acesso a serviços de qualidade, garantindo satisfação e eficiência.</p>
        <h2>Nossa Missão</h2>
        <p>Desenvolver um sistema pró-ativo que atenda às necessidades dos nossos clientes de maneira eficiente e personalizada. Buscamos constantemente antecipar demandas, fornecer soluções práticas e garantir que nossos usuários tenham uma experiência simplificada e satisfatória.</p>
        <h2>Nossa Visão</h2>
        <p>Ser reconhecidos como a solução mais confiável e eficaz no mercado. Queremos nos destacar pela excelência em nossos serviços, pela qualidade do nosso atendimento e pela capacidade de entregar resultados que superem as expectativas. Acreditamos que um sistema confiável é a chave para construir relações duradouras com nossos clientes.</p>
        <h2>Nossos Valores</h2>
        <ul>
            <li><strong>Inovação Constante</strong>: Valorizamos a inovação em todos os aspectos do nosso trabalho. Estamos sempre buscando novas maneiras de melhorar nossos serviços, incorporar tecnologias de ponta e encontrar soluções criativas para os desafios dos nossos clientes.</li>
            <li><strong>Proatividade</strong>: Nos esforçamos para estar sempre à frente, antecipando as necessidades dos nossos clientes e propondo soluções antes mesmo que os problemas surjam.</li>
                <li><strong>Confiabilidade</strong>: Construímos confiança por meio da transparência, consistência e entrega de resultados de alta qualidade. Nossos clientes podem contar conosco para cumprir nossas promessas e superar suas expectativas.</li>
                <li><strong>Eficiência</strong>: Valorizamos a eficiência em nossos processos para garantir que nossos serviços sejam rápidos e eficazes, sem comprometer a qualidade.</li>
                <li><strong>Orientação ao Cliente</strong>: Colocamos nossos clientes no centro de tudo o que fazemos. Nosso objetivo é entender suas necessidades únicas e fornecer soluções que realmente façam a diferença em suas vidas.</li>
            </ul>
        </div>
    </div>
    
    </script>
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
                <h3>&copy; 2024 Agiliza</h3>
            </div>
        </div>
    </footer>
</body>

</html>
