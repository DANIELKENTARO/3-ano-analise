<?php
session_start();
include_once("config.php");

if (isset($_GET['fk_id_carrinho'])) {
    $fk_id_carrinho = $_GET['fk_id_carrinho'];

    if (isset($_POST['submit'])) {
        // Insere no histórico usando apenas o fk_id_carrinho
        $stmt_historico = $conexao->prepare("INSERT INTO historico (fk_id_carrinho) VALUES (?)");
        $stmt_historico->bind_param("i", $fk_id_carrinho);

        if ($stmt_historico->execute()) {
            header("location: index.php");
            exit();
        } else {
            echo "Erro ao registrar a compra.";
        }
    }
} else {
    echo "ID do carrinho não especificado.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Finalizar Compra</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="fk_id_carrinho" value="<?php echo htmlspecialchars($fk_id_carrinho); ?>" readonly>
        <input type="submit" name="submit" value="Finalizar">
    </form>
</body>
</html>
