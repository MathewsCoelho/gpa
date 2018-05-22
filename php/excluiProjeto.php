<?php
$index = base64_encode('idProjeto');

$idProjeto = base64_decode($_GET[$index]);

include 'DAO/ProjetoDAO.php';

$objDAO = new ProjetoDAO();

$query = $objDAO->excluirProjeto($idProjeto);

if($query){
    echo "<script type='text/javascript'>"
    . "location.href = '../view/inicio.php';"
    . "</script>";
} else{
    
    echo "<script type='text/javascript'>"
    . " alert ('Erro ao excluir projeto.');"
    . "history.go(-1);"
    . "</script>";
}

?>

