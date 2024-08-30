<?php
if (isset($_POST['submit'])) {
    include_once("config.php");
    function conversordefloat($preco) {
        return floatval(str_replace(",", ".", $preco));
      }
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nome = sanitizeInput($_POST['nome']);
    $preco = sanitizeInput(conversordefloat($_POST['preco']));
    $quantidade = sanitizeInput($_POST['quantidade']);
    $cor = sanitizeInput($_POST['cor']);
    $categoria = sanitizeInput($_POST['categoria']);
    $target_dir = "img/";
    $target_file = $target_dir . uniqid() . "_" . basename($_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["name"], $target_file);
    $descricao = sanitizeInput($_POST['descricao']);

    $sql = "INSERT INTO produto (nome_produto, preco_produto, quantidade_produto, fk_id_cores, fk_id_categorias, imagem, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sssssss', $nome, $preco, $quantidade, $cor, $categoria, $target_file, $descricao);

    if ($stmt->execute()) {
        echo "<p class='success'>produto cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar produto: " . $conexao->error . "</p>";
    }

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
            <input type="text" name="cor" placeholder="Digite um numero">
            </div>
          
            <div class="formulario_input">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" placeholder="Digite um numero">
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