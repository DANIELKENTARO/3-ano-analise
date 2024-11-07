
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
        <form action="cadastrarcor.php" method="post" class="formlogin" enctype="multipart/form-data">
            <div class="flex_login">
            <h1>Cadastrar cor</h1>

            <div class="formulario_input">
            <label for="opcoes_cores">Nome da cor:</label>
            <input type="text" name="opcoes_cores" placeholder="Nome da cor" autofocus="true" required>
            <input type="submit" name="submit" id="submit"></input><br>
<?php
        include_once('config.php');
    if (isset($_POST['submit'])) {

    $nome = $_POST['opcoes_cores'];


    if ($nome) {
        $stmt = $conexao->prepare("INSERT INTO cores (opcoes_cores) VALUES (?)");
        $stmt->bind_param("s", $nome);

        // Executando a query
        if ($stmt->execute()) {
            echo "Cor cadastrado com sucesso <br>";
        } else {
            echo "Erro ao inserir cor: ";
        }

        $stmt->close();
    }

    $conexao->close();
    }
?>

            <a href="index.php">voltar para a página principal</a><br>
            <a href="cadastro_produto.php">cadastrar produto</a><br>
            <a href="cadastrarcategoria.php">cadastrar uma categoria</a>
            </div>
        </form>
    </div>
    </body>
</html>