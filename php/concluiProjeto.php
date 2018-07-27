<?php
session_start();
$index = base64_encode('idProjeto');

$idProjeto = base64_decode($_GET[$index]);

include 'DAO/ProjetoDAO.php';

$objDAO = new ProjetoDAO();

$query = $objDAO->concluirProjeto($idProjeto);


if($query){
	$_SESSION["success"] = "Projeto concluído com sucesso.";
	header('location: ../view/inicio.php');
} else{
    $_SESSION["danger"] = "Erro ao concluir projeto.";
    header('location: ../view/inicio.php');
}

?>



