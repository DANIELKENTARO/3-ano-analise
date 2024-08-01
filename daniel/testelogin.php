<?php
session_start();
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
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

    $sql = "SELECT * FROM `cliente` WHERE email = '$email' AND senha = '$senha'";

    $result = $conexao->query($sql);

    //print_r($sql."<br>");
    //print_r($result);

    if (mysqli_num_rows($result) < 1){
    header('location: login.php');
    $login_status == false;
    }
    else{
    header('location: index.php');
    $login_status == true;
    }
}
else{
#sem acesso
    header('location: login.php');
}
?>