<?php
session_start(); // Inicia a sessão para armazenar os itens do carrinho
include_once('config.php');
$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';
// Consulta para obter os produtos do banco de dados
$sql = "SELECT * FROM produto JOIN cores ON produto.fk_id_cores = cores.id_cores JOIN categorias ON produto.fk_id_categorias = categorias.id_categorias";
$result = $conexao->query($sql);
?>
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
    <main> 
<div class="main">
            <img src="img/teste.png" class="imagens" alt="">
            <h1 id="h1">Produtos</h1>
            </div>
            <div class='cards'>
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <form method="POST" action="carrinho.php">
                    <div><input type="hidden" name="id_produto" value="<?php echo $row['id_produto']; ?>"></div>
                    <label for="nome_produto"><h1><?php echo $row['nome_produto']?></h1></label>
                    <div><input type="hidden" name="nome_produto" value="<?php echo $row['nome_produto']; ?>" readonly></div>
                    <div><center><img src="<?php echo $row["imagem"]; ?>" alt="erro" class="img1"></center></div>
                    <div class="card_texto"><label for="preco_produto">Preço: R$ <?php echo $row['preco_produto']?></label>
                    <input type="hidden" name="preco_produto" value="<?php echo $row['preco_produto']; ?>"readonly></div>
                    <div class="card_texto"><label for="quantidade">Quantidade:</label>
                    <input type="number" name="quantidade_produto" value="1" min="1" max="<?php echo $row['quantidade_produto'];?>"></div>
                    <div class="card_texto"><label for="fk_id_cores">Cor: <?php echo $row['opcoes_cores']?></label><input type="hidden" name="fk_id_cores" value="<?php echo $row['opcoes_cores']; ?>"readonly></div>
                    <div class="card_texto"><label for="fk_id_categorias">Categoria: <?php echo $row['opcoes_categorias']?><input type="hidden" name="fk_id_categorias" value="<?php echo $row['opcoes_categorias']; ?>"readonly></div>
                    <div class="card_texto"><label for="descricao">descrição: <?php echo $row['descricao']?><input type="hidden" name="descricao" value="<?php echo $row['descricao']; ?>"readonly></div>
                    <input type="submit" name="add_to_cart" value="Adicionar ao Carrinho">
                </form>
            </div>
        <?php endwhile; ?>
</div>
    </main>
    <footer>
        <h2>todos os direitos reservados</h2>

    </footer>
</body>
</html>