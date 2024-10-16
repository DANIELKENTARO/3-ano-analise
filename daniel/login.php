<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    #com acesso

    function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    include_once("config.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM `cliente` WHERE email = '$email' AND senha = '$senha'";

    $cpf = "SELECT cpf FROM `cliente` WHERE email = '$email' AND senha = '$senha'";

    $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['cpf'] = $row['cpf']; // Armazena o CPF na sessão

                // Verifica o tipo de usuário
                if ($row['tipo'] == 1) {
                    // Login válido para administrador, redireciona para adm.php
                    header("Location: adm.php");
                } elseif ($row['tipo'] == 2) {
                    // Login válido para cliente especial, redireciona para especial.php
                    header("Location: vendedor.php");
                } else {
                    // Login válido para outro tipo de usuário, redireciona para home
                    header("Location: index.php");
                }
        } else {
            echo "Email ou senha inválidos.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        input{
            background-color: #fff.34;
            color: #fff !important;
        }
        .mensagem{
            color: white;
            display: absolute;
            position: absolute;
            margin-left: 45vw;
            margin-top: 15vh;
        }
    </style>
</head>
<body>
    <div class="tela_login">
        <form action="login.php" method="post" class="formlogin">
            <div class="flex_login">
            <h1>Login</h1>
            <p>Digite os dados de acesso abaixo</p>
            <div class="formulario_input">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="digite seu email" required autofocus="true" >
            </div>
            <div class="formulario_input">
            <label for="senha">senha:</label>
            <input type="password" id="password" name="senha" placeholder="digite sua senha" required>
            </div>
            <a href="#"><h6>esqueci minha senha</h6></a> <br>
            <input type="submit" name="submit" value="enviar">
            </div>
        </form>
        <a id="a" href="criar_conta.php">criar uma conta?</a>
    </div>
    </body>
</html>