<?php
include_once('config.php');
if (isset($_POST['submit'])) {

    $nome = $_POST['opcoes_categorias'];

    $sql = "SELECT * FROM categorias";
        $stmt = $conexao->prepare("INSERT INTO categorias (opcoes_categorias) VALUES (?)");
        $stmt->bind_param("s", $nome);

        // Executando a query
        if ($stmt->execute()) {
            echo "Categoria cadastrado com sucesso";
        } else {
            echo "Erro ao inserir categoria: " . $stmt->error;
        }

        $stmt->close();
}

    $conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="cadastrarcategoria.php" method="post" class="formlogin">
            <div class="flex_login">
            <h1>Cadastrar categoria</h1>

            <div class="formulario_input">
            <label for="opcoes_categorias">Nome da categoria:</label>
            <input type="text" name="opcoes_categorias" placeholder="Nome da categoria" autofocus="true" required>
            <input type="submit" name="submit" id="submit"></input><br>
            <a href="index.php">voltar para a página principal</a><br>
            <a href="cadastro_produto.php">cadastrar produto</a><br>
            <a href="cadastrarcategoria.php">cadastrar uma cor</a>
            </div>
        </form>
    </div>
    </body>
</html>