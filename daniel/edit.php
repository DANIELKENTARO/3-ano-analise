<?php
include_once('config.php');

// Verifica se o parâmetro 'email' foi enviado via GET
if (isset($_GET['cpf'])) {
    // Sanitiza o email para evitar injeção de SQL
    $cpf = mysqli_real_escape_string($conexao, $_GET['cpf']);

    // Prepara a consulta SQL utilizando prepared statements
    $sql = "SELECT * FROM cliente WHERE cpf=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $cpf);

    // Executa a consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $user_data = $result->fetch_assoc();

            // Atribui os valores aos campos do formulário
            $cpf = $user_data['cpf'];
            $telefone= $user_data['telefone'];
            $email= $user_data['email'];
            $cep= $user_data['cep'];
            $senha= $user_data['senha'];
            // ... outros campos ...
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
        exit;
    }

    // Fecha o statement
    $stmt->close();
} else {
    header('Location: listacliente.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: url(imagem.jpg);
            background-size: 600px;
             background-repeat: no-repeat;
             background-position-x: center;
        }
        h1{
            text-align: center;
        }
        header{
            background-color: palevioletred;
             padding: 10px 0;
            text-align: center;
            }
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #45e05f;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #435dd1;
        }
        header{
        background-color: palevioletred;
        padding: 10px 0;
        text-align: center;
        }

        nav ul{
        list-style: none;

        }

            nav ul li{
        display: inline;
        margin-right: 20px;
        }
        nav ul li a{
        text-decoration: none;
        color: #151414;
        font-weight: bold;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="login.html"><h1>inicio</h1></a></li>
                
              </ul>
        </nav>
       
    </header>
    <h1>Cadastro de Cliente</h1>
    <body>
    <a href="listacliente.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
          
          <div class="formulario_input">
          <label for="cpf">CPF:</label>
          <input type="text" name="cpf" value="<?php echo $cpf; ?>" autocomplete="on" maxlength="14" autofocus="true" require>
          <script src="java.js"></script>
          <label for="tel">Telefone:</label>
          <input type="tel" name="telefone" value="<?php echo $telefone; ?>" placeholder="(00)00000-0000" onkeypress="mask(this, mphone);" maxlength="16">
          </div>
         
          <div class="formulario_input">
          <label for="Email">E-mail:</label>
          <input type="email" name="email"  value="<?php echo $email; ?>" placeholder="digite seu email" maxlength="80" require>
          <label for="cep">Cep:</label>
          <input type="text" name="cep"  value="<?php echo $cep; ?>" placeholder="digite seu cep" onkeyup="handleZipCode(event)" maxlength="9">
          </div>
        
          <div class="formulario_input">
          <label for="password">Senha:</label>
          <input type="text" name="senha" value="<?php echo $senha; ?>"  placeholder="crie uma senha" min="8" max="80" required>
          <select list="tipo" name="tipo" id="0">
              <option name="tipo" value="0">cliente</option>
              <option name="tipo" value="1">adm</option>
              <option name="tipo" value="2">vendedor</option>
          </select>
          </div>
        <br><br>
        <input type="hidden" name="email" value=<?php echo $email;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>

</html>