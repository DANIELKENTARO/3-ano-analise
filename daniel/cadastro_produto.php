<?php
include_once('config.php');
if (isset($_POST['submit'])) {
    function conversordefloat($preco) {
        return floatval(str_replace(",", ".", $preco));
      }
    // Função para upload de imagem (com tratamento de erros)
    function uploadImagem($imagem) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($imagem["name"]);

        if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Erro ao fazer upload da imagem.";
            return null;
        }
    }

    $nome = $_POST['nome'];
    $preco = conversordefloat($_POST['preco']);
    $quantidade = $_POST['quantidade'];
    $cor = $_POST['cor'];
    $categoria = $_POST['categoria'];
    $imagem = $_FILES["imagem"];
    $descricao = $_POST['descricao'];
    
    

    $imagem_path = null;
    if (isset($imagem) && $imagem["error"] === 0) {
        $imagem_path = uploadImagem($imagem);
        if (!$imagem_path) {
            $erros[] = "Erro ao enviar a imagem.";
        }
    }

    if ($imagem_path) {
        $stmt = $conexao->prepare("INSERT INTO produto (nome_produto, preco_produto, quantidade_produto, fk_id_cores, fk_id_categorias, imagem, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nome, $preco, $quantidade, $cor, $categoria, $imagem_path, $descricao);

        // Executando a query
        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso";
        } else {
            echo "Erro ao inserir produto: " . $stmt->error;
        }

        $stmt->close();
    }

    $conexao->close();
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
        <form action="cadastro_produto.php" method="post" class="formlogin" enctype="multipart/form-data">
            <div class="flex_login">
            <h1>Cadastrar produto</h1>

            <div class="formulario_input">
            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" placeholder="Nome Produto" autofocus="true" required>
            <label for="preco">Preço do produto:</label>
            <input type="number" placeholder="0.00" name="preco" step="0.01"  required>
            </div>
           
            <div class="formulario_input">
            <label for="quantidade">Quantidade de produtos:</label>
            <input type="text" name="quantidade" placeholder="Quantidade de produtos" required>
            <label for="cor">Cores:</label>
            <select list="cor" name="cor" placeholder="cor">
                <option value="1">Azul</option>
                <option value="2">Amarelo</option>
                <option value="3">Branco</option>
                <option value="4">Bege</option>
                <option value="5">Preto</option>
                <option value="6">Vermelho</option>
                <option value="7">Marronm</option>        
            </select>
            </div>
          
            <div class="formulario_input">
            <label for="categoria">Categoria:</label>
            <select id="categoria">
                <option value="1">casual</option>
                <option value="2">escolar</option>
                <option value="3">escritório</option>
                <option value="4">recreativo</option>
                <option value="5">brinquedos</option>
                <option value="6">relaxante</option>
                <option value="7">formal</option>
                <option value="8">formatura</option>
                <option value="9">celular</option>
                <option value="10">computadores</option>
                <option value="11">componentes eletronicos</option>
                <option value="12">pneus</option>
                <option value="13">carros</option>
                <option value="14">memes</option>
                <option value="15">filmes</option>
                <option value="16">séries</option>
                <option value="17">televisões</option>
                <option value="18">eletronico</option>
                <option value="19">pelucia</option>
                <option value="20">caro</option>
                <option value="21">barato</option>
        </select>
            <label for="imagem">Foto do produto:</label>
            <input type="file" name="imagem" placeholder="escolha uma foto" accept="daniel/img/*">
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