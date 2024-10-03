<?php
session_start(); // Inicia a sessão para armazenar os itens do carrinho
include_once('config.php');

// Consulta para obter os produtos do banco de dados
$sql = "SELECT * FROM produto JOIN cores ON produto.fk_id_cores = cores.id_cores JOIN categorias ON produto.fk_id_categorias = categorias.id_categorias";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Loja</title>
</head>
<body>
    <h1>Produtos</h1>
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

</section>
    </div>
</body>
</html>
