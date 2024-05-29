<?php
if (isset($_POST['submit'])) 
    include_once("config.php");

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process registration form submission
if (isset($_POST['submit'])) {

    // Sanitize user input
    $cpf = sanitizeInput($_POST['cpf']);
    $telefone = sanitizeInput($_POST['telefone']);
    $email = sanitizeInput($_POST['email']);
    $cep = sanitizeInput($_POST['cep']);
    $senha = sanitizeInput($_POST['senha']);


    // Check if password meets minimum length requirement
    if (strlen($senha) < 8) {
        echo "<p class='error'>Senha deve ter no mínimo 8 caracteres!</p>";
        exit();
    }
    // Check if cpf meets minimum length requirement
    if (strlen($cpf) < 11) {
        echo "<p class='error'>cpf deve ter no mínimo 11 caracteres!</p>";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
    
    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO cliente (cpf, telefone, email, cep, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sssss', $cpf, $telefone, $email, $cep, $hashedPassword);

    if ($stmt->execute()) {
        echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }

    $stmt->close();
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
            <input type="text" name="cpf" placeholder="123.456.789.10" autocomplete="on" maxlength="14" autofocus="true" require>
            <script src="java.js"></script>
            <label for="tel">Telefone:</label>
            <input type="tel" name="telefone" placeholder="(00)00000-0000" onkeypress="mask(this, mphone);" maxlength="16">
            </div>
           
            <div class="formulario_input">
            <label for="Email">E-mail:</label>
            <input type="email" name="email" placeholder="digite seu email" maxlength="80" require>
            <label for="cep">Cep:</label>
            <input type="text" name="cep" placeholder="digite seu cep" onkeyup="handleZipCode(event)" maxlength="9">
            </div>
          
            <div class="formulario_input">
            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="crie uma senha" min="8" max="80" required>
            </div>
            <input type="submit" name="submit"></input>
            <a href="index.html">voltar</a>
            </div>
        </form>
    </div>
    </body>
</html>