<?php
session_start();
$index = base64_encode('idProjeto');

$idProjeto = base64_decode($_GET[$index]);

include 'DAO/ProjetoDAO.php';

$objDAO = new ProjetoDAO();

if($objDAO->excluirProjeto($idProjeto)){
	$_SESSION['success'] = "Projeto excluido com sucesso.";
    echo "<script type='text/javascript'>"
    . "location.href = '../view/grupos.php';"
    . "</script>";
} else{
    $_SESSION['danger'] = "Falha ao excluir projeto.";
    echo "<script type='text/javascript'>"
    . "location.href = '../view/grupos.php';"
    . "</script>";;
}

?>

