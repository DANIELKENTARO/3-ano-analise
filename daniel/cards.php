<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header> 
            <div class="menu">
                <div>
                <a href="index.php">
                    <li><img src="img/logo.png" class="imglogo" id="img1"></li>
                </a>
                </div>
    <div class="login">
    <?php 
    
    if (empty($_SESSION['cpf'])) {
        echo "<button><a href='login.php'>login</a></button>";
    } else {
        echo "<li style='float: left;'><a href='sair.php' class='btn btn-danger me-5'><h3>Sair</h3></a></li>";
    }
    ?>
    
    <button><a href="criar_conta.php">criar conta</a></button>
        <div class="carrinho">
    <a href="carrinho.php">
        <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
    </a>
        </div>
</header>
<div class='cards'>
<?php
$n = 0;
include_once('config.php');
$sql = "SELECT * FROM produto";
$result = $conexao->query($sql);
if (mysqli_num_rows($result) >= 1){

    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      echo "<section class='card'>";
      $n += 1;
      echo "<div> <h1 class='card_titulo'> ID do produto: " . $row["id_produto"] . "</h1></div>";
      echo "<div> Nome do produto: " . $row["nome_produto"] . "</div>";
      echo "<div> <center><img src='" . $row["imagem"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
      echo "<div class='card_texto'>  Preço: R$" . $row["preco_produto"] . "</div>";
      echo "<div class='card_texto'> Quantidade: " . $row["quantidade_produto"] . "</div>";
      echo "<div class='card_texto'> Cor id: " . $row["fk_id_cores"] . "</div>";
      echo "<div class='card_texto'> Categoria id: " . $row["fk_id_categorias"] . "</div>";
      echo "<div class='card_texto'> Descrição:  " . $row["descricao"]. "</div>";
      print_r("<div align='right'>$n</div>");
      echo "</section>";  

    }
} else {
    echo "0 resultados";
}

$conexao->close();
?>
</div>
</body>
</html>