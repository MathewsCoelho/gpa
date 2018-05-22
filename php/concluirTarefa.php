<?php
$idTarefa = base64_decode($_GET['idTarefa']);

include 'DAO/TarefaDAO.php';

$objDAO = new TarefaDAO();

$query = $objDAO->concluirTarefa($idTarefa);


if($query){
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
} else{
    
    echo "<script type='text/javascript'>"
    . " alert ('Erro ao concluir projeto.');"
    . "history.go(-1);"
    . "</script>";
}

?>

