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
        include_once 'TO/GrupoTO.php';

        $objTO = new GrupoTO();
        $objTO->setnomeGrupo($nomeGrupo);
        $objTO->setdescricao($descricao);
        $objTO->setdataCadastro($dataCadastro);
        $objTO->setidUsuario($_SESSION["id"]);
        ($dataCadastro);

        include_once 'DAO/GrupoDAO.php';

        $objDAO = new GrupoDAO();

        if ($objDAO->salvarGrupo($objTO)) {
            echo "<script type='text/javascript'>"
            . " location.href = '../view/grupos.php'"
            . "</script>";
        } else {
            echo "<script type='text/javascript'>"
            . "alert('Usuário já está cadastrado.');"
            . " history.go(-1);"
            . "</script>";
        }
    }
?>

