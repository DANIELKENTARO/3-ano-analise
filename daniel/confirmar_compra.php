<?php
if (isset($_POST['submit']) && !empty($_POST['estado']) && !empty($_POST['municipio']) && !empty($_POST['numero'])) {
    #com acesso

        function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include_once("config.php");
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $numero =  $_POST['numero'];

    $result = $conexao->query($sql);

    //print_r($sql."<br>");
    //print_r($result);

}
else{
    #sem acesso
    //header('location: criar_conta.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="index.html" method="get">
        <input type="" value="Confirmar compra?"></input>
    </form>
</body>
</html>