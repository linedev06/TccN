<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGILIZA - Cadastro de Usuário</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
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
        form input[type="date"],
        form input[type="file"],
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
        <h1>AGILIZA - Cadastro de Usuário</h1>

        <form id="userRegistrationForm" action="cad_usuario.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Informações Pessoais</legend>
                <label for="nome">Nome completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Insira seu nome" required>
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="11" placeholder="Insira seu CPF" required>
                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" maxlength="9" placeholder="Insira seu RG" required>
                <label for="dt_nasc">Data de nascimento:</label>
                <input type="date" id="dt_nasc" name="dt_nasc" required>
                <label for="imagem">Imagem de Perfil (opcional):</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
            </fieldset>
            <fieldset>
                <legend>Endereço</legend>
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Insira seu endereço" required>
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" placeholder="Insira seu bairro" required>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" placeholder="Insira sua cidade" required>
            </fieldset>
            <fieldset>
                <legend>Contato</legend>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Insira seu email" required>
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" maxlength="11" placeholder="Insira seu telefone" required>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Insira sua senha" required>
            </fieldset>
            <button type="submit" id="register">Registrar</button>
        </form>
    </div>
</div>
</body>
</html>
