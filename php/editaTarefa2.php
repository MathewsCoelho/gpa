<?php
    session_start();
    $nomeTarefa = $_POST['nomeTarefa'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $statusTarefa = $_POST['statusTarefa'];
    $idTarefa = $_GET['idTarefa'];
    $idProjeto = $_GET['idProjeto'];
    
    if(empty($nomeTarefa) || empty($descricao) || empty($dataInicio) || empty($dataFim)){
        $_SESSION['danger'] = "Por favor preencha todos os campos.";
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        if($dataInicio < date('2000-m-d')){
             $_SESSION['danger'] = "Por favor digite uma data válida.";
            echo "<script type='text/javascript'>"
            . "alert('Por favor digite uma data válida.');"
            . " history.go(-1);"
            . "</script>";
        }else{
            
            include 'TO/TarefaTO.php';
            $objTO = new TarefaTO();
            $objTO->setnomeTarefa($nomeTarefa);
            $objTO->setDescricao($descricao);
            $objTO->setdataInicio($dataInicio);
            $objTO->setdataFim($dataFim);
            $objTO->setdataCadastro("");
            $objTO->setidTarefa($idTarefa);
            $objTO->setidProjeto($idProjeto);
            $objTO->setstatusTarefa($statusTarefa);

            include 'DAO/TarefaDAO.php';

            $objDAO = new TarefaDAO();
            
            if ($objDAO->editarTarefa($objTO, $idTarefa)) {
                $_SESSION['success'] = "Tarefa editada com sucesso.";
                echo "<script type='text/javascript'>"
                . " location.href = '../view/listagemTarefas.php?" . base64_encode('idProjeto') . "=" . base64_encode($idProjeto) ."';"
                . "</script>";
            } else {
                $_SESSION['danger'] = "Falha ao editar tarefa.";
                echo "<script type='text/javascript'>"
                . "alert('Erro ao editar tarefa.');"
                . " history.go(-1);"
                . "</script>";
            }
        }
    }
?>

