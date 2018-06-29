<?php
    $nomeGrupo = $_POST['nomeGrupo'];
    $descricao = $_POST['descricao'];
    $dataCadastro =  date('Y-m-d');
            
    if(empty($nomeGrupo) || empty($descricao)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        session_start();
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
            include_once 'TO/MembroTO.php';

            $objTO2 = new MembroTO();
            $objTO2->setidUsuario($_SESSION["id"]);
            $objTO2->setidGrupo($idGrupo);

            include_once 'DAO/MembroDAO.php';

            $objDAO2 = new MembroDAO();

            if($objDAO2->salvarMembro($objTO2)){
            echo "<script type='text/javascript'>"
            . " location.href = '../view/grupos.php'"
            . "</script>";
            }
            else{
                echo "<script type='text/javascript'>"
            . "alert('Falha ao cadastrar membro.');"
            . " history.go(-1);"
            . "</script>";
            }
        } else {
            echo "<script type='text/javascript'>"
            . "alert('Falha ao cadastrar grupo.');"
            . " history.go(-1);"
            . "</script>";
        } 
    }
?>

