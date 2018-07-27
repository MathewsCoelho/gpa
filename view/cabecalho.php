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
        
        <?php
            session_start();

            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('Location:inicial.php');
            }
            require_once("../php/mostra_alerta.php");
            require_once("../php/DAO/ConviteDAO.php");
            $objDAO = new ConviteDAO();
            $notificacoes = $objDAO->verificaConvite($_SESSION['id']);
        ?>
    </head>
    
     <body>
        <header>
            <div class="header">
                <ul class="nav nav-pills">
                    <li class="fon"><a href="../view/inicio.php"> <img src="../assets/imagens/logo3.png"> </a></li>
                    <li class="fon"><a class="elemento" href="../view/inicio.php"> Projetos </a></li>
                    <li><a class="elemento" href="../view/grupos.php"> Grupos </a></li>
                    <?php if($notificacoes){ ?>
                    <li><a class="elemento" href="../view/convites.php"><i class="fa fa-exclamation" aria-hidden="true"> </i></a></li>
                    <?php } else{ ?>
                    <li><a class="elemento" href="../view/convites.php"><i class="fa fa-bell-o" aria-hidden="true"> </i></a></li>
                    <?php } ?>
                    <li><a class="elemento" href="../php/logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
                </ul> 
            </div>
        </header>
    <div class="alerta"> 
        <?php mostraAlerta("success"); ?>
        <?php mostraAlerta("danger"); ?> 
    </div>
