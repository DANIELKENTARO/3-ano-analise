<?php
include_once('config.php');

if (!empty($_GET['cpf'])) {
    $cpf = mysqli_real_escape_string($conexao, $_GET['cpf']);

    // Prepare the SELECT query
    $sqlSelect = "SELECT * FROM cliente WHERE cpf=?";
    $stmtSelect = $conexao->prepare($sqlSelect);
    $stmtSelect->bind_param("s", $cpf);

    // Execute the SELECT query
    if ($stmtSelect->execute()) {
        $result = $stmtSelect->get_result();

        if ($result->num_rows > 0) {
            // Prepare the DELETE query
            $sqlDelete = "DELETE FROM cliente WHERE cpf=?";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bind_param("s", $cpf);

            // Execute the DELETE query
            if ($stmtDelete->execute()) {
                echo "Cliente deletado com sucesso!";
            } else {
                echo "Erro ao deletar cliente: " . $stmtDelete->error;
            }
        } else {
            echo "Cliente não encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta SELECT: " . $stmtSelect->error;
    }

    // Close statements
    $stmtSelect->close();
    $stmtDelete->close();
}

header('Location: listacliente.php');
?>