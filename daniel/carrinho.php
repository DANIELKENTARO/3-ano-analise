    <?php
session_start();
// Adiciona produto ao carrinho
if (isset($_POST['add_to_cart'])) {
    $id_produto = $_POST['id_produto'];
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $quantidade_produto = $_POST['quantidade_produto'];

    $item = array(
        'id_produto' => $id_produto,
        'nome_produto' => $nome_produto,
        'preco_produto' => $preco_produto,
        'quantidade_produto' => $quantidade_produto
    );

    // Verifica se o carrinho já contém produtos
    if (isset($_SESSION['carrinho'])) {
        // Verifica se o produto já está no carrinho
        $item_exists = false;
        foreach ($_SESSION['carrinho'] as $produto) {
            if ($produto['id_produto'] == $id_produto) {
                // Se o produto já estiver no carrinho, impede a adição novamente
                $item_exists = true;
                echo "<p class='erro'>O produto já está no carrinho!</p>";
                break;
            }
        }
        if (!$item_exists) {
            $_SESSION['carrinho'][] = $item; // Adiciona o produto se ele não estiver no carrinho
        }
    } else {
        // Cria o carrinho com o primeiro produto
        $_SESSION['carrinho'][] = $item;
    }
}

// Remove item do carrinho
if (isset($_POST['remove_item'])) {
    foreach ($_SESSION['carrinho'] as $key => $produto) {
        if ($produto['id_produto'] == $_POST['id_produto']) {
            unset($_SESSION['carrinho'][$key]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
       
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: hsl(219, 54%, 33%);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #20206b94;
    }

    tr:hover {
        background-color: #554747;
    }


    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: hsl(219, 54%, 33%);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    td form {
        display: inline-block;
    }
    .remove-btn:hover {
            background-color: #c82333;
    }
    .finalizar-compra-btn:hover {
        background-color: #0056b3;
    }


    </style>
</head>
<body>
<header>
    <div class="menu">
        <a href="index.php"><li><img src="img/logo.png" class="imglogo" id="img1"></li></a>
        <div class="login">
            <button><a href="login.php">login</a></button>
            <button><a href="criar_conta.php">criar conta</a></button>
            <div class="carrinho">
                <a href="carrinho.php">
                    <img src="img/carrinho.png" alt="Carrinho" id="img2">
                </a>
            </div>
        </div>
    </div>
</header>
<h1>Carrinho de Compras</h1>
<?php if (!empty($_SESSION['carrinho'])): ?>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_geral = 0;
            foreach ($_SESSION['carrinho'] as $produto): 
                $total_produto = $produto['preco_produto'] * $produto['quantidade_produto'];
                $total_geral += $total_produto;
            ?>
                <tr>
                    <td><?php echo $produto['nome_produto']; ?></td>
                    <td>R$<?php echo $produto['preco_produto']; ?></td>
                    <td><?php echo $produto['quantidade_produto']; ?></td>
                    <td>R$<?php echo $total_produto; ?></td>
                    <td>
                        <form method="POST" action="carrinho.php">
                            <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                            <input type="submit" name="remove_item" class="remove-btn" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: R$<?php echo $total_geral; ?></h2>
<?php else: ?>
    <p>O carrinho está vazio.</p>
<?php endif; ?>

<!-- Botão de Finalizar Compra -->
<form action="confirmar_compra.php" method="POST">
    <input type="hidden" name="total_geral" value="<?php echo $total_geral; ?>">
    <?php foreach ($_SESSION['carrinho'] as $produto): ?>
        <input type="hidden" name="produtos[]" value="<?php echo json_encode($produto); ?>">
    <?php endforeach; ?>
    <input type="submit" class="finalizar-compra-btn" value="Finalizar Compra">
</form>
<a href="index.php"><button>Voltar aos Produtos</button></a>
</body>
</html>
