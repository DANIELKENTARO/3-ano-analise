<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>página</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        *{
            word-wrap: break-word;
        }
        .informacoes{
            border: 1px solid rgb(111, 128, 180);
        }
        .especificacoes{
            border: 1px solid rgb(111, 128, 180);
        }
        .img_produto{
            width: 30vw;
        }
        .input_produtos{
            width: 20vw;
            background-color: #575a5ebb;
        }
        .input_produtos ::placeholder{
            font-size: 120%;
            color: #777777c7;
        }
        #dropdown_cores{
            border-radius: 4px;
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
        <img src="img/carrinho.png" alt="Google (Noto Color Emoji - Unicode 15.1)" id="img2">
    </a>
        </div>
</header>

<main class="main">
<div class="produto_display">
        <img src="img/Sem título.png" alt="erro" name="imagem" class="img_produto">
        <div>
            <input type="number" name="numero_produtos" id="numero_produtos" class="input_produtos" placeholder="quantidade de produtos">
        </div>
        <div>
            <select name="cor" class="input_produtos" id="dropdown_cores">
                <option value="cor1">cor1</option>
                <option value="cor2">cor2</option>
                </select>
        </div>
</div>
<section>
        <div class="informacoes_produto">
    <div class="informacoes">
<h1 id="produto_titulo">Descrição:</h1> <hr>
<section>pouco usado, com embalagem original, etc.</section>
    </div>
    <div class="especificacoes">
<h1 id="produto_titulo">especificações:</h1> <hr>
<section>preço:</section>
<section>tamanho:</section>
<section>cor:</section>
<section>etc. sdfbhadsbhfkjadshfasdhfjshfhjksadfhjksdafhjkhfalskdjhfkdsahfjkhdsfjklhdsafdsfdsafdsafasdfsdafdsafdsafsdafsadfsadfasdfadsfsdafasdfsadfsadfdsafsdafdsfasdfsadfsdafdsaf</section>
    </div>

        </div>
</section>
</body>
</html>