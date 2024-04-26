<?php
if (isset($_POST['submit']))
{
include_once("php/config.php");
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cep = $_POST["cep"];
$senha = $_POST["senha"];
$result = mysqli_query($conexao, "INSERT INTO `cliente`(cpf,telefone,email,cep,senha) VALUES($cpf, $telefone, $email, $cep, $senha)");
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
</head>
<body>
    <div class="tela_login">
        <form action="criar_conta.php" method="post" class="formlogin">
            <div class="flex_login">
            <h1>Criar Conta</h1>
            <p>Digite seus dados para criar sua conta</p>
          
            <div class="formulario_input">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" placeholder="000.000.000-00" autofocus="true" required>
            <label for="tel">Telefone:</label>
            <input type="tel" name="telefone" placeholder="00 00000000">
            </div>
           
            <div class="formulario_input">
            <label for="Email">E-mail:</label>
            <input type="text" name="email" placeholder="digite seu email" max="80">
            <label for="cep">Cep:</label>
            <input type="text" name="cep" placeholder="digite seu cep" min="9" max="9" required>
            </div>
          
            <div class="formulario_input">
            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="crie uma senha" min="8" max="80" required>
            </div>
            <input type="submit" name="submit"></input>
            </div>
        </form>
    </div>
    </body>
</html>