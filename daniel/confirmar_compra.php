<?php
session_start();
include_once("config.php");

// Recebe os produtos do carrinho
$produtos = isset($_POST['produtos']) ? $_POST['produtos'] : [];

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
    $stmt_historico->execute();

    // Atualiza o carrinho com o ID do primeiro produto (opcional)
    // Se quiser associar um produto específico ao carrinho
    $stmt_update_carrinho = $conexao->prepare("UPDATE carrinho SET fk_id_carrinho_produtos = (SELECT id_carrinho_produtos FROM carrinho_produtos WHERE fk_id_carrinho = ? LIMIT 1) WHERE id_carrinho = ?");
    $stmt_update_carrinho->bind_param("ii", $fk_id_carrinho, $fk_id_carrinho);
    $stmt_update_carrinho->execute();

    header("location: finalizar_compra.php?fk_id_carrinho=$fk_id_carrinho");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Compra</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="cpf" placeholder="123.456.789-10" autocomplete="on" maxlength="14" autofocus="true" required>
        <script src="java.js"></script>
        <input type="hidden" name="produtos[]" value="<?php echo htmlspecialchars(json_encode($_SESSION['carrinho'])); ?>">
        <input type="text" placeholder="Estado" maxlength="2" name="estado" required>
        <input type="text" placeholder="Município" name="municipio" required>
        <input type="text" placeholder="Bairro" name="bairro" required>
        <input type="text" placeholder="Rua" name="rua" required>
        <input type="text" placeholder="Número" name="numero" required>
        <input type="submit" name="submit" value="Confirmar Compra">
    </form>
</body>
</html>
