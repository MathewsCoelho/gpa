<?php
    session_start();
    $nomeProjeto = $_POST['nomeProjeto'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $data_cadastro = date('Y-m-d');
    $statusProjeto = 1;

    if(empty($nomeProjeto) || empty($descricao) || empty($dataInicio) || empty($dataFim)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        if($dataInicio < date('Y-m-d')){
        echo "<script type='text/javascript'>"
        . "alert('Por favor digite uma data válida.');"
        . " history.go(-1);"
        . "</script>";
    }else{

            include 'TO/ProjetoTO.php';

            $objTO = new ProjetoTO();
            $objTO->setnomeProjeto($nomeProjeto);
            $objTO->setDescricao($descricao);
            $objTO->setdataInicio($dataInicio);
            $objTO->setTipo($dataFim);
            $objTO->setdataCadastro($data_cadastro);
            $objTO->setidUsuario($_SESSION["id"]);
            $objTO->setstatusProjeto($statusProjeto);

            include 'DAO/ProjetoDAO.php';
            
            $objDAO = new ProjetoDAO();

            if ($objDAO->salvarProjeto($objTO)) {
               $_SESSION['success'] = "Projeto cadastrado com sucesso.";
                header('location: ../view/inicio.php');
            } else {
                $_SESSION['danger'] = "Falha ao cadastrar projeto.";
                header('location: ../view/inicio.php');
            }
        }
    }
?>
