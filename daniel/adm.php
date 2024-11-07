<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <style>
        li{
            margin: 10pt;
        }
        button {
            width: 24vw;
            height: 4vh;
            gap: 1vw;
            border-radius: 6px;
        }
        button:hover {
            color: white;
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
   
    
    <button><a href="criar_conta.php">criar conta</a></button>
    <?php 
    
    if (empty($_SESSION['cpf'])) {
        echo "<button><a href='login.php'>login</a></button>";
    } else {
        echo "<li style='float: left;'><a href='sair.php' class='btn btn-danger me-5'><h3>Sair</h3></a></li>";
    }
    ?>
        <div class="carrinho">
    <a href="carrinho.php">
        <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
    </a>
        </div>
</header>

<br>
<br>
<h1>Ações</h1>
<br>
<br>
<center>
    <section class="contato">
        <a href="listacliente.php"><button>Lista de Clientes</button></a>
        <a href="criar_conta.php"><button>Cadastrar Cliente</button></a>
        <a href="cadastro_produto.php"><button>Cadastrar Produto</button></a>
        <a href="cards.php"><button>Visualizar Produtos</button></a>
    </section>
</center>
</body>
</html>
