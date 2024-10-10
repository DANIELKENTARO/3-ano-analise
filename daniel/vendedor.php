<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        button{
            width: 24vw;
            height: 4vh;
            gap: 1vw;
            border-radius: 6px;
        }
        button:hover{
            color: white;
            background-color: rgba(210, 210, 210);
            border-color: rgba(210, 210, 210);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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

<li style=".btn btn-danger me-5{float: left;}"><a href="sair.php" class="btn btn-danger me-5"><h3>Sair</h3></a></li>
    </div>
    </header>
    <center>
    <section class="contato">
    <a href="cadastro_produto.php"><button>Cadastrar produto</button></a>
    <a href="cards.php"><button>visualizar produtos</button></a>
    </section>
    </center>
</body>
</html>