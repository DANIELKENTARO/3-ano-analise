<?php
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    #com acesso
        
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    include_once("config.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //print_r('Email: ' . $email . "<br>");
   //print_r('Senha: ' . $senha. "<br>");
    
    $sql = "SELECT * FROM `cliente` WHERE email = '$email' AND senha = '$senha';";

    $result = $conexao->query($sql);

    //print_r($sql."<br>");
    //print_r($result);
        if (mysqli_num_rows($result) < 1){
            header("location: login.php");
        }
        else{
            header("location: index.html");
        }
}
else{
    #sem acesso
    header('location: login.php');
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
    
</body>
</html>
