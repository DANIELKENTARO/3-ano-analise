<?php
session_start();
include_once("config.php");

// Supondo que a quantidade do produto foi armazenada na sessão
$quantidade_nova = isset($_SESSION['quantidade_produto']) ? intval($_SESSION['quantidade_produto']) : 0; // Valor padrão

if (isset($_GET['fk_id_carrinho'])) {
    $fk_id_carrinho = intval($_GET['fk_id_carrinho']);

    if (isset($_POST['submit'])) {
        // Verifica se já existe um registro no histórico para o carrinho
        $stmt_check = $conexao->prepare("SELECT COUNT(*) FROM historico WHERE fk_id_carrinho = ?");
        $stmt_check->bind_param("i", $fk_id_carrinho);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {
            // Redireciona para index.php se já houver registro
            header("Location: index.php");
            exit();
        } else {
            // Insere no histórico
            $stmt_historico = $conexao->prepare("INSERT INTO historico (fk_id_carrinho) VALUES (?)");
            $stmt_historico->bind_param("i", $fk_id_carrinho);

            if ($stmt_historico->execute()) {
                // Obtém a quantidade atual do produto
                $stmt_atual = $conexao->prepare("SELECT quantidade_produto FROM produto WHERE id_produto = ?");
                $stmt_atual->bind_param("i", $fk_id_carrinho);
                $stmt_atual->execute();
                $stmt_atual->bind_result($quantidade_atual);
                $stmt_atual->fetch();
                $stmt_atual->close();

                // Calcula a nova quantidade
                $nova_quantidade = $quantidade_atual - $quantidade_nova;

                // Atualiza a quantidade do produto
                $stmt_produto = $conexao->prepare("UPDATE produto SET quantidade_produto = ? WHERE id_produto = ?");
                $stmt_produto->bind_param("ii", $nova_quantidade, $fk_id_carrinho);

                if ($stmt_produto->execute()) {
                    unset($_SESSION['carrinho']);
                    header("Location: index.php");
                    exit(); // Importante: Saia após o redirecionamento
                } else {
                    echo "Erro ao atualizar a quantidade do produto: " . $stmt_produto->error;
                }
            } else {
                echo "Erro ao registrar a compra: " . $stmt_historico->error;
            }
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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to top, rgb(11, 10, 24), rgb(18, 18, 20));
        }
        .container {
            background-color: rgba(40, 40, 60, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h1 {
            color: rgb(200, 210, 220);
            margin-bottom: 20px;
        }
        input[type="hidden"] {
            display: none;
        }
        input[type="submit"] {
            cursor: pointer;
            font-size: larger;
            border: none;
            color: rgb(210, 210, 210);
            background: linear-gradient(rgba(80, 80, 80, 0.7), rgba(90, 90, 90, 0.8)),
                        linear-gradient(to right, #333333, #222222, #555555) border-box;
            border-radius: 8px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: rgba(210, 210, 210, 0.8);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Finalizar Compra</h1>
        <form action="" method="post">
            <input type="hidden" name="fk_id_carrinho" value="<?php echo htmlspecialchars($fk_id_carrinho); ?>">
            <input type="submit" name="submit" value="Finalizar">
        </form>
    </div>
</body>
</html>
