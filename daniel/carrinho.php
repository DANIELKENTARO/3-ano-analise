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
    $estado = sanitizeInput($_POST['estado']);
    $municipio = sanitizeInput($_POST['municipio']);
    $numero = sanitizeInput($_POST['numero']);


    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO carrinho (estado, municipio, numero) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sss', $estado, $municipio, $numero);

    if ($stmt->execute()) {
        header('location: confirmar_compra.php');
    }
    else {
        header('location: testelogin.php');
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
        .card{
            margin-left: 1vw;
            margin-right: 1vw;
            gap: 1vh;
            display: grid;
            grid-row: auto;
            grid-template-columns: auto auto auto auto auto;
            grid-template-rows: auto;
        }
        .card img{
            width: 19vw;
        }
        .cards section{
            gap: 4vh;
            border: 1px solid black;
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
    <a href="carrinho.php">
    <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
    </a>
    </div>
</header>
<main>
        <div class="carrinho">
            <div class="carrinho_produtos">
                <div class="card">
                    <section>
                        <section><img src="img/Sem título.png" alt="" name="produto"></section>
                        <section><div name="preco">R$ 00.00</div></section>
                    </section>
                </div>
            </div>
            <div class="formulario_carrinho">
                <form action="confirmar_compra.php" method="post" class="formlogin">
                    <div class="flex_login">
                        <div class="formulario_input">
                        <label for="estado">Estado:</label>
                        <input type="text" nome="estado" placeholder="Digite o nome do seu estado" autofocus="false" required>
                        </div>
                        <div class="formulario_input">
                        <label for="municipio">Municipio:</label>
                        <input type="text" name="municipio" placeholder="Digite o nome da sua cidade" required>
                        </div>
                        <div class="formulario_input">
                        <label for="numero">Número:</label>
                        <input type="number" name="numero" minlength="1" placeholder="Digite o número da sua casa" required>
                        </div>
                        <input type="submit" value="finalizar compra">
                </form>
            </div>
        </div>
</main>
</body>
</html>