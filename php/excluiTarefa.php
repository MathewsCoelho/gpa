<?php
session_start();
$idTarefa = base64_decode($_GET['idTarefa']);

include 'DAO/TarefaDAO.php';

$objDAO = new TarefaDAO();

$query = $objDAO->excluirTarefa($idTarefa);

if($query){
	$_SESSION['success'] = "Tarefa excluída com sucesso.";
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
} else{
    $_SESSION['danger'] = "Falha ao excluir tarefa.";
    echo "<script type='text/javascript'>"
    . " alert ('Erro ao excluir tarefa.');"
    . "history.go(-1);"
    . "</script>";
}

?>

