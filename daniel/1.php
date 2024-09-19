
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
<?php
$row ="";
include_once('config.php');
$sql = "SELECT nome_produto, preco_produto, quantidade_produto, fk_id_cores, fk_id_categorias, imagem, descricao FROM `produto` WHERE `produto` = 1";
$result = $conexao->query($sql);
if (mysqli_num_rows($result) >= 1){
            echo "<section class='card'>";
            echo "<div> <h1 class='card_titulo'> Nome do produto: " . $row["nome_produto"] . "</h1></div>";
            echo "<div> <center><img src='" . $row["imagem"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
            echo "<div class='card_texto'>  Preço: R$" . $row["preco_produto"] . "</div>";
            echo "<div class='card_texto'> Quantidade: " . $row["quantidade_produto"] . "</div>";
            echo "<div class='card_texto'> Cor id: " . $row["fk_id_cores"] . "</div>";
            echo "<div class='card_texto'> Categoria id: " . $row["fk_id_categorias"] . "</div>";
            echo "<div class='card_texto'> Descrição:  " . $row["descricao"]. "</div>";
            echo "</section>";  
}
$conexao->close();
?>