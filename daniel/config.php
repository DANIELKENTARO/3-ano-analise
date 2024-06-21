<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "daniel1";

$conexao = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

//if ($conexao->connect_errno){
//    echo"erro";
//}
//else{
//    echo"conexão estabelecida";
//}