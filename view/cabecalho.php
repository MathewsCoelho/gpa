<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../assets/javascript/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="../assets/javascript/bootstrap.js" type="text/javascript"></script>
        <script src="../assets/javascript/funcao.js" type="text/javascript"></script>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link href="../assets/css/estilo.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> !-->
        
        <?php
            session_start();
            if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('Location:inicial.php');
            }
        ?>
    </head>
    
     <body>
        <header>
            <div class="header">
                <ul class="nav nav-pills">
                    <li><a href="../view/inicio.php"> Projetos </a></li>
                    <li><a href="../view/grupos.php"> Grupos </a></li>
                    <li><a href="../view/sobre.php"> Sobre </a></li>
                    <li><a href="../view/convites.php"><p class="glyphicon glyphicon-bell" aria-hidden="true"></p></a></li>
                    <li><a href="../php/logout.php"><p class="glyphicon glyphicon-off" aria-hidden="true"></p></a></li>
                </ul> 
            </div>
        </header>
    
