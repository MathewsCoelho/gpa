<?php

$servidor = "localhost";
$user = "root";
$psw = "";
$db = "gpa";

$conexao = mysqli_connect($servidor, $user, $psw, $db);

if(mysqli_connect_errno()){
    echo "Erro ao conectar na base de dados: " . mysqli_connect_errno();
}
?>


