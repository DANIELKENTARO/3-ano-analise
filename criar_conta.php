<?php
if (isset($_POST['submit'])){
    print_r($_POST["cpf"]);
    print_r($_POST["telefone"]);
    print_r($_POST["email"]);
    print_r($_POST["cep"]);
    print_r($_POST["senha"]);
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
            <input type="text" name="cpf" placeholder="000.000.000-00" min="14" max="14" autofocus="true" required>
            <label for="tel">Telefone:</label>
            <input type="tel" placeholder="00 00000000" min="9" max="11" autocomplete="tel-national">
            </div>
            <div class="formulario_input">
            <label for="Email">E-mail:</label>
            <input type="email" name="email" placeholder="digite seu email" max="80" autocomplete="email" required>
            <label for="cep">Cep:</label>
            <input type="text" name="cep" placeholder="digite seu cep" min="9" max="9" required>
            </div>
            <div class="formulario_input">
            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="crie uma senha" min="8" max="80" required>
            </div>
            <input type="submit"><a id="a" href="index.html">enviar</a></input>
            </div>
        </form>
    </div>
    </body>
</html>