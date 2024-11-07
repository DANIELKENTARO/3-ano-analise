<?php
session_start(); // Inicia a sessão para armazenar os itens do carrinho
include_once('config.php');
$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';

// Consulta para obter os produtos do banco de dados
$sql = "SELECT * FROM produto 
        JOIN cores ON produto.fk_id_cores = cores.id_cores 
        JOIN categorias ON produto.fk_id_categorias = categorias.id_categorias";
$result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #4CAF50; /* Verde */
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<header> 
    <div class="menu">
        <div>
            <a href="index.php">
                <img src="img/logo.png" class="imglogo" id="img1" alt="Logo">
            </a>
        </div>
        <div class="login">
            <?php
            if (empty($cpf)) {
                echo "<button><a href='login.php'>Login</a></button>";
            } else {
                $query = "SELECT tipo FROM cliente WHERE cpf = ?";
                $stmt = $conexao->prepare($query);
                $stmt->bind_param("s", $cpf);
                $stmt->execute();
                $resultCliente = $stmt->get_result();

                if ($resultCliente->num_rows > 0) {
                    $row = $resultCliente->fetch_assoc();
                    $tipo = $row['tipo'];

                    echo "<div class='dropdown' style='display: inline-block;'>";
                    echo "<button class='dropbtn'>Opções</button>
                          <div class='dropdown-content'>";
                    if ($tipo == 1) {
                        echo "<a href='adm.php'>Página Administrador</a>";
                    } elseif ($tipo == 2) {
                        echo "<a href='vendedor.php'>Página Vendedor</a>";
                    }
                    echo "<a href='historico.php'>Ver Histórico</a>";
                    echo "<a href='sair.php' class='btn btn-danger'>Sair</a>";
                    echo "</div></div>";
                } else {
                    echo "<p>Cliente não encontrado.</p>";
                }
            }
            ?>
            <button><a href="criar_conta.php">Criar Conta</a></button>
            <div class="carrinho">
                <a href="carrinho.php">
                    <img src="img/carrinho.png" alt="Carrinho" id="img2">
                </a>
            </div>
        </div>
    </div>
</header>
<main> 
    <div class="main">
        <img src="img/teste.webp" class="imagens" alt="Imagem Principal">
        <h1 id="h1">Produtos</h1>
    </div>
    <div class='cards'>
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="card">
            <form method="POST" action="carrinho.php">
                <input type="hidden" name="id_produto" value="<?php echo $row['id_produto']; ?>">
                <h1><?php echo $row['nome_produto']; ?></h1>
                <input type="hidden" name="nome_produto" value="<?php echo $row['nome_produto']; ?>" readonly>
                <div><center><img src="<?php echo $row["imagem"]; ?>" alt="Imagem do Produto" class="img1"></center></div>
                <div class="card_texto">
                    <label for="preco_produto">Preço: R$ <?php echo number_format($row['preco_produto'], 2, ',', '.'); ?></label>
                    <input type="hidden" name="preco_produto" value="<?php echo $row['preco_produto']; ?>" readonly>
                </div>
                <div class="card_texto">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" name="quantidade_produto" value="1" min="1" max="<?php echo $row['quantidade_produto']; ?>">
                </div>
                <div class="card_texto">
                    <label for="fk_id_cores">Cor: <?php echo $row['opcoes_cores']; ?></label>
                    <input type="hidden" name="fk_id_cores" value="<?php echo $row['opcoes_cores']; ?>" readonly>
                </div>
                <div class="card_texto">
                    <label for="fk_id_categorias">Categoria: <?php echo $row['opcoes_categorias']; ?></label>
                    <input type="hidden" name="fk_id_categorias" value="<?php echo $row['opcoes_categorias']; ?>" readonly>
                </div>
                <div class="card_texto">
                    <label for="descricao">Descrição: <?php echo $row['descricao']; ?></label>
                    <input type="hidden" name="descricao" value="<?php echo $row['descricao']; ?>" readonly>
                </div>
                <input type="submit" name="add_to_cart" value="Adicionar ao Carrinho">
            </form>
        </div>
        <?php endwhile; ?>
    </div>
</main>
<footer>
    <h2>Todos os direitos reservados</h2>
</footer>
</body>
</html>