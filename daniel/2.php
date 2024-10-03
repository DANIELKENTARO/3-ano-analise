<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>página</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<section class='card'>
<?php
$row ="";
include_once('config.php');
$sql1 = "SELECT * FROM produto JOIN cores ON produto.fk_id_cores = cores.id_cores JOIN categorias ON produto.fk_id_categorias = categorias.id_categorias WHERE produto = 2";
$result = $conexao->query($sql1);
if (mysqli_num_rows($result) >= 1){
    while($row = $result->fetch_assoc()) {
            echo "<div> <h1 class='card_titulo'> Nome do produto: " . $row["nome_produto"] . "</h1></div>";
            echo "<div> <center><img src='" . $row["imagem"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
            echo "<div class='card_texto'>  Preço: R$" . $row["preco_produto"] . "</div>";
            echo "<div class='card_texto'> Quantidade: " . $row["quantidade_produto"] . "</div>";
            echo "<div class='card_texto'> Cor: " . $row["opcoes_cores"] . "</div>";
            echo "<div class='card_texto'> Categoria: " . $row["opcoes_categorias"] . "</div>";
            echo "<div class='card_texto'> Descrição:  " . $row["descricao"]. "</div>";
    }
}

?>
</section>