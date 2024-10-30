<?php
session_start();
include_once('config.php');

$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';

if (empty($cpf)) {
    header("Location: login.php");
    exit();
}

// Consulta para obter apenas a data_hora do histórico de compras do usuário
$sql = "SELECT h.data_hora 
        FROM historico h
        JOIN carrinho c ON h.fk_id_carrinho = c.id_carrinho
        WHERE c.fk_cpf = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Compras</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa; /* Cor da borda */
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2c2f33; /* Cor de fundo para o cabeçalho */
            color: #ffffff; /* Texto do cabeçalho em branco */
        }
        tr:nth-child(even) {
            background-color: #e0e0e0; /* Cor de fundo para linhas pares */
            color: #333333; /* Texto das linhas pares em cinza escuro */
        }
        tr:nth-child(odd) {
            background-color: #d0d0d0; /* Cor de fundo para linhas ímpares */
            color: #333333; /* Texto das linhas ímpares em cinza escuro */
        }
        tr:hover {
            background-color: #b0b0b0; /* Cor de fundo ao passar o mouse */
            color: #ffffff; /* Texto ao passar o mouse em branco */
        }
        td {
            font-size: 16px; /* Tamanho da fonte das células */
        }
        caption {
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
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
                <li><img src="img/logo.png" class="imglogo" id="img1"></li>
            </a>
        </div>
        <div class="login">
            <?php 
            if (empty($_SESSION['cpf'])) {
                echo "<button><a href='login.php'>login</a></button>";
            } else {
                echo "
                <div class='dropdown' style='display: inline-block;'>
                    <button class='dropbtn'>Opções</button>
                    <div class='dropdown-content'>
                        <a href='historico.php'>Ver Histórico</a>
                        <a href='sair.php' class='btn btn-danger'>Sair</a>
                    </div>
                </div>";
            }
            ?>
            <button><a href="criar_conta.php">criar conta</a></button>
            <div class="carrinho">
                <a href="carrinho.php">
                    <img src="img/carrinho.png" alt="Carrinho" id="img2">
                </a>
            </div>
        </div>
    </div>
</header>
<main>
    <h1>Histórico de Compras</h1>
    <table>
        <tr>
            <th>Data e Hora</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['data_hora']); ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td>Nenhum registro encontrado no seu histórico de compras.</td>
            </tr>
        <?php endif; ?>
    </table>
</main>
<footer>
    <h2>Todos os direitos reservados</h2>
</footer>
</body>
</html>
