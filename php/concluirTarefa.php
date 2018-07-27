<?php
session_start();
$idTarefa = base64_decode($_GET['idTarefa']);

include 'DAO/TarefaDAO.php';

$objDAO = new TarefaDAO();

$query = $objDAO->concluirTarefa($idTarefa);


if($query){
    $_SESSION['success'] = "Tarefa concluída com sucesso.";
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
} else{
    $_SESSION['danger'] = "Falha ao concluir tarefa.";
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
}

?>

