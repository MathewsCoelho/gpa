<?php
session_start();
$index = base64_encode('idProjeto');
$idProjeto = base64_decode($_GET[$index]);

include_once 'DAO/GrupoDAO.php';

$objDAO = new GrupoDAO();

$query = $objDAO->excluirGrupo($idProjeto);

if($query){
	$_SESSION['success'] = "Grupo excluído com sucesso.";
    echo "<script type='text/javascript'>"
    . "location.href = '../view/grupos.php';"
    . "</script>";
} else{
	$_SESSION['danger'] = "Falha ao excluir grupo.";
    echo "<script type='text/javascript'>"
    . "history.go(-1);"
    . "</script>";
}

?>

