<?php

session_start();

if(isset($_SESSION['id'])){
    header("Location: view/inicio.php");
}else{
    header("Location: view/inicial.php");
}
?>

