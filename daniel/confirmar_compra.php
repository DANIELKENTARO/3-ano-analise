<?php
session_start();
include_once("config.php");

// Verifica se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php"); // Redireciona para a página do carrinho
    exit();
}

// Recebe os produtos do carrinho
$produtos = isset($_POST['produtos']) ? $_POST['produtos'] : [];
$cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '';

if (isset($_POST['submit'])) {
    $fk_cpf = $_POST['cpf'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    // Insere o registro principal no carrinho
    $stmt_carrinho = $conexao->prepare("INSERT INTO carrinho (fk_cpf, estado, municipio, bairro, rua, numero) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_carrinho->bind_param("ssssss", $fk_cpf, $estado, $municipio, $bairro, $rua, $numero);
    $stmt_carrinho->execute();

    // Captura o ID do carrinho recém-inserido
    $fk_id_carrinho = $conexao->insert_id;

    // Agora insira os produtos associados ao carrinho
    $stmt_produto = $conexao->prepare("INSERT INTO carrinho_produtos (fk_id_carrinho, fk_id_produto) VALUES (?, ?)");
    
    foreach ($produtos as $produto_json) {
        $produto = json_decode($produto_json, true);
        $id_produto = $produto['id_produto'];

        // Insere cada produto associado ao carrinho
        $stmt_produto->bind_param("ii", $fk_id_carrinho, $id_produto);
        $stmt_produto->execute();
    }

    // Insere no histórico com o ID do carrinho
    $stmt_historico = $conexao->prepare("INSERT INTO historico (fk_id_carrinho) VALUES (?)");
    $stmt_historico->bind_param("i", $fk_id_carrinho);

    if ($stmt_historico->execute()) {
        // Se a inserção no histórico for bem-sucedida, atualiza o carrinho
        $stmt_update_carrinho = $conexao->prepare("UPDATE carrinho SET fk_id_carrinho_produtos = (SELECT id_carrinho_produtos FROM carrinho_produtos WHERE fk_id_carrinho = ? LIMIT 1) WHERE id_carrinho = ?");
        $stmt_update_carrinho->bind_param("ii", $fk_id_carrinho, $fk_id_carrinho);
        $stmt_update_carrinho->execute();

        header("location: finalizar_compra.php?fk_id_carrinho=$fk_id_carrinho");
        exit();
    } else {
        echo "Erro ao inserir no histórico: " . $stmt_historico->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Compra</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        input {
            background-color: rgba(255, 255, 255, 0.34);
            color: #fff !important;
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
                echo "<li style='float: left;'><a href='sair.php' class='btn btn-danger me-5'><h3>Sair</h3></a></li>";
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

<h1>Confirme a compra</h1>
<form action="" method="post" class="formlogin">
    <div class="formulario_input">
        <label for="cpf">Cpf: </label>
        <input type="text" name="cpf" placeholder="123.456.789-10" value="<?php echo htmlspecialchars($cpf); ?>" autocomplete="on" maxlength="14" required>
        <input type="hidden" name="produtos[]" value="<?php echo htmlspecialchars(json_encode($_SESSION['carrinho'])); ?>">
        <label for="estado">Estado: </label>
        <input type="text" placeholder="Estado" maxlength="2" autofocus="true" name="estado" required>
        <label for="municipio">Município: </label>
        <input type="text" placeholder="Município" name="municipio" required>
        <label for="bairro">Bairro: </label>
        <input type="text" placeholder="Bairro" name="bairro" required>
        <label for="rua">Rua: </label>
        <input type="text" placeholder="Rua" name="rua" required>
        <label for="numero">Número: </label>
        <input type="text" placeholder="Número" name="numero" required>
    </div>
    <input type="submit" name="submit" value="Confirmar Compra">
</form>
</body>
</html>
