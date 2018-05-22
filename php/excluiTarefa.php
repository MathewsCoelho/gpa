<?php

$idTarefa = base64_decode($_GET['idTarefa']);

include 'DAO/TarefaDAO.php';

$objDAO = new TarefaDAO();

$query = $objDAO->excluirTarefa($idTarefa);

if($query){
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
} else{
    
    echo "<script type='text/javascript'>"
    . " alert ('Erro ao excluir tarefa.');"
    . "history.go(-1);"
    . "</script>";
}

?>

