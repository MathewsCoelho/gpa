<?php
    
    $nomeProjeto = $_POST['nomeProjeto'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $statusProjeto = $_POST['statusProjeto'];
    $idProjeto = $_GET['idProjeto'];
    
    
    if(empty($nomeProjeto) || empty($descricao) || empty($dataInicio) || empty($dataFim)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        if($dataInicio < date('2000-m-d')){
        echo "<script type='text/javascript'>"
        . "alert('Por favor digite uma data válida.');"
        . " history.go(-1);"
        . "</script>";
        }else{
            session_start();
       
            include 'TO/ProjetoTO.php';
            $objTO = new ProjetoTO();
            $objTO->setnomeProjeto($nomeProjeto);
            $objTO->setDescricao($descricao);
            $objTO->setdataInicio($dataInicio);
            $objTO->setTipo($dataFim);
            $objTO->setdataCadastro("");
            $objTO->setidUsuario($_SESSION["id"]);
            $objTO->setstatusProjeto($statusProjeto);
            include 'DAO/ProjetoDAO.php';

            $objDAO = new ProjetoDAO();

            if ($objDAO->editarProjeto($objTO, $idProjeto)) {

                echo "<script type='text/javascript'>"
                . " location.href = '../view/inicio.php';"
                . "</script>";
            } else {
                echo "<script type='text/javascript'>"
                . "alert('Erro ao editar projeto.');"
                . " history.go(-1);"
                . "</script>";
            }
        }
    }
?>

