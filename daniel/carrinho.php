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
    //$hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
    
    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO cliente (cpf, telefone, email, cep, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sssss', $cpf, $telefone, $email, $cep, $senha);

    if ($stmt->execute()) {
        echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }

    $stmt->close();
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>página</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        input{
            background-color: #fff.34;
            color: #fff !important;
        }
    </style>
    </head>
<body>
    <header> 
        <div class="menu">
            <div>
            <a href="index.html">
                <li><img src="img/logo.png" class="imglogo" id="img1"></li>
            </a>
            </div>
<div class="login">
<button><a href="login.php">login</a></button>
<button><a href="criar_conta.php">criar conta</a></button>
    <div class="carrinho">
<a href="carrinho.html">
    <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
</a>
    </div>
    </header>
    <main>
        <div class="carrinho">
            <div class="carrinho_produtos">
                <div class="flex_carrinho">
                    <label for="carrinho1"></label>
                    <img src="img/Sem título.png" alt="aaaa" id="img1">
                    <div class="bloco1" id="carrinho1">aaa</div>
                </div>
            </div>
            <div class="formulario_carrinho">
                <form action="confirmar_compra.php" method="post" class="formlogin">
                    <div class="flex_login">
                        <div class="formulario_input">
                        <label for=""></label>
                        <input type="" id="" placeholder="" autofocus="true" required>
                        </div>
                        <div class="formulario_input">
                        <label for=""></label>
                        <input type="" placeholder="" required>
                        </div>
                        <div class="formulario_input">
                        <label for=""></label>
                        <input type="" placeholder="" required>
                        </div>
                        <div class="formulario_input">
                        <label for=""></label>
                        <input type="" placeholder="" required>
                        </div>
                        <input type="submit" value="finalizar compra">
                </form>
            </div>
        </div>
    </main>
</body>
</html>