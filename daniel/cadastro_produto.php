<?php
session_start();
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
    $nome = sanitizeInput($_POST['nome']);
    $preco = sanitizeInput($_POST['preco']);
    $quantidade = sanitizeInput($_POST['quantidade']);
    $cor = sanitizeInput($_POST['cor']);
    $categoria = sanitizeInput($_POST['categoria']);
    $foto = sanitizeInput($_POST['foto']);
    $descricao = sanitizeInput($_POST['descricao']);

    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO produto (nome_produto, preco_produto, quantidade_produto, pk_id_cores, pk_id_categorias, imagem, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sssssss', $nome, $preco, $quantidade, $cor, $categoria, $foto, $descricao);

    if ($stmt->execute()) {
        echo "<p class='success'>produto cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar produto: " . $conexao->error . "</p>";
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
    <title>cadastrar produto</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        input{
            background-color: #fff.34;
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="tela_login">
        <form action="cadastro_produto.php" method="post" class="formlogin">
            <div class="flex_login">
            <h1>Cadastrar produto</h1>

            <div class="formulario_input">
            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" placeholder="Nome Produto" autofocus="true" required>
            <label for="preco">Preço do produto:</label>
            <input type="text" name="preco" placeholder="R$ 00,00" autocomplete="on" maxlength="12" required>
            </div>
           
            <div class="formulario_input">
            <label for="quantidade">Quantidade de produtos:</label>
            <input type="text" name="quantidade" placeholder="Quantidade de produtos" required>
            <label for="cor">Cores:</label>
            <input type="text" name="cor" placeholder="Cores dispoíveis">
            </div>
          
            <div class="formulario_input">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" placeholder="Escreva uma categoria">
            <label for="foto">Foto do produto:</label>
            <input type="file" name="foto" placeholder="escolha uma foto" required>
            </div>
            <div class="formulario_input">
            <label for="descricao">Adicione uma descrição:</label>
            <input type="text" maxlength="200" name="descricao" placeholder="insira uma descrição" required>
        </div>
            <input type="submit" name="submit" id="submit"></input><br>
            <a href="index.php">voltar</a>
            </div>
        </form>
    </div>
    </body>
</html>