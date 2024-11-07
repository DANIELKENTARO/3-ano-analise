<?php
session_start(); // Inicia a sessão para armazenar os itens do carrinho
include_once('config.php');
$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilos do seu CSS */
        .card, img {
            overflow: hidden;
        }
        .cards {
            display: flex; /* Organiza os cartões em linha */
            flex-wrap: wrap; /* Permite que os cartões quebrem linha */
            gap: 20px; /* Espaçamento entre os cartões */
            padding: 20px; /* Espaçamento interno */
        }
        .card {
            border: 1px solid #ccc; /* Borda dos cartões */
            border-radius: 8px; /* Cantos arredondados */
            padding: 10px; /* Espaçamento interno */
            width: 300px; /* Largura fixa dos cartões */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .card img {
            max-width: 100%; /* Imagem se adapta ao tamanho do cartão */
            height: auto; /* Mantém a proporção da imagem */
        }

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
<div class='cards'>
<?php
include_once('config.php');
if (!empty($cpf)) {
    $query = "SELECT tipo FROM cliente WHERE cpf = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $resultCliente = $stmt->get_result();

    if ($resultCliente->num_rows > 0) {
        $rowCliente = $resultCliente->fetch_assoc();
        $tipo = $rowCliente['tipo'];

        if ($tipo == 1) {
            // Administrador: Todos os produtos
            $sql = "SELECT * FROM produto";
        } elseif ($tipo == 2) {
            // Vendedor: Apenas produtos do vendedor
            $sql = "SELECT * FROM produto WHERE cpf = '$cpf'";
        }

        $result = $conexao->query($sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while($rowProduto = $result->fetch_assoc()) {
                echo "<section class='card'>";
                echo "<h1 class='card_titulo'>ID do produto: " . htmlspecialchars($rowProduto["id_produto"]) . "</h1>";
                echo "<div>Nome do produto: " . htmlspecialchars($rowProduto["nome_produto"]) . "</div>";
                echo "<div><center><img src='" . htmlspecialchars($rowProduto["imagem"]) . "' alt='Imagem do produto' class='img1'></center></div>";
                echo "<div class='card_texto'>Preço: R$ " . number_format($rowProduto["preco_produto"], 2, ',', '.') . "</div>";
                echo "<div class='card_texto'>Quantidade: " . htmlspecialchars($rowProduto["quantidade_produto"]) . "</div>";
                echo "<div class='card_texto'>Cor ID: " . htmlspecialchars($rowProduto["fk_id_cores"]) . "</div>";
                echo "<div class='card_texto'>Categoria ID: " . htmlspecialchars($rowProduto["fk_id_categorias"]) . "</div>";
                echo "<div class='card_texto'>Descrição: " . htmlspecialchars($rowProduto["descricao"]) . "</div>";
                echo "</section>";
            }
        } else {
            echo "<p>0 resultados</p>";
        }
    } else {
        echo "<p>Cliente não encontrado.</p>";
    }
}
$conexao->close();
?>
</div>
</body>
</html>
