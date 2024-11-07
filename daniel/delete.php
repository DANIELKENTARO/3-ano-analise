<?php
include_once('config.php');

if (!empty($_GET['cpf'])) {
    $cpf = mysqli_real_escape_string($conexao, $_GET['cpf']);

    // Prepara a consulta SELECT
    $sqlSelect = "SELECT * FROM cliente WHERE cpf=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("s", $cpf);

    // Executa a consulta SELECT
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Prepara as consultas DELETE
            $sqlDelete = "DELETE FROM cliente WHERE cpf=?";
            $sqlDelete2 = "DELETE FROM produto WHERE cpf=?";
            $sqlDelete3 = "DELETE FROM carrinho WHERE fk_cpf=?";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete2 = $conexao->prepare($sqlDelete2);
            $stmtDelete3 = $conexao->prepare($sqlDelete3);
            $stmtDelete->bind_param("s", $cpf);
            $stmtDelete2->bind_param("s", $cpf);
            $stmtDelete3->bind_param("s", $cpf);

            // Inicia uma transação para garantir que todas as exclusões sejam feitas de forma atômica
            $conexao->begin_transaction();

            try {
                // Executa as exclusões
                if ($stmtDelete->execute()) {
                    echo "Cliente excluído com sucesso!<br>";
                } else {
                    throw new Exception("Erro ao excluir cliente: " . $stmtDelete->error);
                }

                if ($stmtDelete2->execute()) {
                    echo "Produtos relacionados excluídos com sucesso!<br>";
                } else {
                    throw new Exception("Erro ao excluir produtos: " . $stmtDelete2->error);
                }

                if ($stmtDelete3->execute()) {
                    echo "Carrinho relacionado excluído com sucesso!<br>";
                } else {
                    throw new Exception("Erro ao excluir carrinho: " . $stmtDelete3->error);
                }

                // Confirma a transação
                $conexao->commit();
                echo "Todas as exclusões foram realizadas com sucesso!";
            } catch (Exception $e) {
                // Em caso de erro, faz o rollback da transação
                $conexao->rollback();
                echo "Erro ao deletar cliente e dados relacionados: " . $e->getMessage();
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Fecha as instruções
    $stmtSelect->close();
    $stmtDelete->close();
    $stmtDelete2->close();
    $stmtDelete3->close();
}

// Redireciona após a operação
header('Location: listacliente.php');
exit;
?>
