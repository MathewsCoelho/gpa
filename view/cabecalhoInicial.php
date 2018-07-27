<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../assets/javascript/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="../assets/javascript/bootstrap.js" type="text/javascript"></script>
        <script src="../assets/javascript/funcao.js" type="text/javascript"></script>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" href="../assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="../assets/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
       session_start();
        require_once("../php/mostra_alerta.php");
        if(isset($_SESSION['email'])){
                header('Location:inicio.php');
            }
    ?>
    <header>
        <div class="header headerInicial">
            <a class="logoInit" href="../view/inicial.php"> <img src="../assets/imagens/logo3.png"> </a>
            <ul class="nav nav-pills">
                <li><a class="elemento" href="../view/loginUsuario.php"> Entrar </a></li>
                <li><a class="elemento" href="../view/cadUsuario.php"> Cadastrar </a></li>
            </ul> 
        </div>
    </header>

    <div class="alerta"> 
        <?php mostraAlerta("success"); ?>
            <?php mostraAlerta("danger"); ?> 
    </div>
