

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
<?php
                    $row ="";
                    include_once('config.php');
                    $sql1 = "SELECT * FROM `cores`";
                    $result = $conexao->query($sql1);
                    if (mysqli_num_rows($result) >= 1){
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["id_cores"]."'>".$row["opcoes_cores"]."</option>";
                        }
                    }
?>
            </select>
            </div>
          
            <div class="formulario_input">
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria">
<?php
                    $row ="";
                    include_once('config.php');
                    $sql1 = "SELECT * FROM `categorias`";
                    $result = $conexao->query($sql1);
                    if (mysqli_num_rows($result) >= 1){
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id_categorias']."'>".$row["opcoes_categorias"]."</option>";
                        }
                    }
?>
        </select>
            <label for="imagem">Foto do produto:</label>
            <input type="file" name="imagem" placeholder="escolha uma foto" accept="daniel/img/*">
            </div>
            <div class="formulario_input">
            <label for="descricao">Adicione uma descrição:</label>
            <input type="text" maxlength="200" name="descricao" placeholder="insira uma descrição" required>
        </div>
            <input type="submit" name="submit" id="submit"></input><br><?php
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
            <a href="index.php">voltar para a página principal</a><br>
            <a href="cadastrarcor.php">cadastrar uma cor</a><br>
            <a href="cadastrarcategoria.php">cadastrar uma categoria</a>
            </div>
        </form>
    </div>
    </body>
</html>