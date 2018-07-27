<?php
    session_start();
    $nomeGrupo = $_POST['nomeGrupo'];
    $descricao = $_POST['descricao'];
    $dataCadastro =  date('Y-m-d');
            
    if(empty($nomeGrupo) || empty($descricao)){
        $_SESSION['danger'] = "Por favor preencha todos os campos.";
        echo "<script type='text/javascript'>"
        . " history.go(-1);"
        . "</script>";
    } else{
        require 'TO/GrupoTO.php';

        $objTO = new GrupoTO();
        $objTO->setnomeGrupo($nomeGrupo);
        $objTO->setdescricao($descricao);
        $objTO->setdataCadastro($dataCadastro);
        $objTO->setidUsuario($_SESSION["id"]);

        include_once 'DAO/GrupoDAO.php';

        $objDAO = new GrupoDAO();
        $idGrupo = $objDAO->salvarGrupo($objTO);

        if($idGrupo){
            $tipo = 2;
            include_once 'TO/MembroTO.php';

            $objTO2 = new MembroTO();
            $objTO2->setidUsuario($_SESSION["id"]);
            $objTO2->setidGrupo($idGrupo);
            $objTO2->settipo($tipo);

            include_once 'DAO/MembroDAO.php';

            $objDAO2 = new MembroDAO();

            if($objDAO2->salvarMembro($objTO2)){
                $_SESSION['success'] = "Grupo cadastrado com sucesso.";
                echo "<script type='text/javascript'>"
                . " location.href = '../view/grupos.php'"
                . "</script>";
            }
            else{
                $_SESSION['danger'] = "Falha ao cadastrar grupo.";
                echo "<script type='text/javascript'>"
                . " history.go(-1);"
                . "</script>";
            }
        } else {
            $_SESSION['danger'] = "Falha ao cadastrar grupo.";
            echo "<script type='text/javascript'>"
            . " history.go(-1);"
            . "</script>";
        } 
    }
?>

