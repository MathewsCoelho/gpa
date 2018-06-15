<?php    
    $nomeTarefa = $_POST['nomeTarefa'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $data_cadastro = date('Y-m-d');
    $statusTarefa = 1;
    
    $index = base64_encode('idProjeto');

    $idProjeto = base64_decode($_GET[$index]);   
    
    if(empty($nomeTarefa) || empty($descricao) || empty($dataInicio) || empty($dataFim)){
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
            
            include 'TO/TarefaTO.php';

            $objTO = new TarefaTO();
            $objTO->setnomeTarefa($nomeTarefa);
            $objTO->setdescricao($descricao);
            $objTO->setdataInicio($dataInicio);
            $objTO->setdataFim($dataFim);
            $objTO->setdataCadastro($data_cadastro);
            $objTO->setstatusTarefa($statusTarefa);
            $objTO->setidProjeto($idProjeto);
            include 'DAO/TarefaDAO.php';
        
            $objDAO = new TarefaDAO();
            
            if ($objDAO->salvarTarefa($objTO)) {

                echo "<script type='text/javascript'>"
                . "history.go(-2)"
                . "</script>";
            } else {
                echo "<script type='text/javascript'>"
                . "</script>";
            }
        }
    }
?>

?>

