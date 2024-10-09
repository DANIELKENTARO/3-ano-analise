<?php
if (isset($_POST['submit'])){
    $login_status == true;
}
?><!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>página</title>
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
<button><a href="login.php">login</a></button>
<button><a href="criar_conta.php">criar conta</a></button>
    <div class="carrinho">
<a href="carrinho.php">
    <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
</a>
    </div>
    </header>
    <main> 
<div class="main">
            <img src="img/teste.png" class="imagens" alt="">
            <h1 id="h1">Produtos</h1>
            </div>
            <div class='cards'>
<?php
session_start();
$n = 0;
include_once('config.php');
$sql = "SELECT * FROM produto";
$result = $conexao->query($sql);
if (mysqli_num_rows($result) >= 1){
        while($row = $result->fetch_assoc()) {
            include_once('config.php');
            $n += 1;
            echo "<a href='1.php'> <section class='card'>";
            echo "<div><input type='hidden' name='id_produto' value='".$row["id_produto"]."'></div>";
            echo "<div> <h1 class='card_titulo'> Nome do produto: " . $row["nome_produto"] . "</h1></div>";
            echo "<div> <center><img src='" . $row["imagem"] . "' alt='Imagem' class='img1'><br></center>" . "</div>";
            echo "<div class='card_texto'>  Preço: R$" . $row["preco_produto"] . "</div>";
            echo "<div class='card_texto'> Quantidade: " . $row["quantidade_produto"] . "</div>";
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
    </main>
    <footer>
        <h2>todos os direitos reservados</h2>

    </footer>
</body>
</html>