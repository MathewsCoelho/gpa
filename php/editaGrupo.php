<?php
    session_start();
    $id_grupo = $_POST['id_grupo'];
    $nomeGrupo = $_POST['nomeGrupo'];
    $descricao = $_POST['descricao'];       
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
        $objTO->setidGrupo($id_grupo);

        include_once 'DAO/GrupoDAO.php';
        $objDAO = new GrupoDAO();

        if ($objDAO->editarGrupo($objTO)) {
            $_SESSION['success'] = "Grupo editado com sucesso.";
            header("Location:../view/grupos.php");
        } else {
            $_SESSION['danger'] = "Falha ao cadastrar grupo.";
            echo "<script type='text/javascript'>"
            . " history.go(-1);"
            . "</script>";
        } 
    }
?>

