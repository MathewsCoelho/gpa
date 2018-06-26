<?php
$index = base64_encode('idProjeto');
$idProjeto = base64_decode($_GET[$index]);

include_once 'DAO/GrupoDAO.php';

$objDAO = new GrupoDAO();

$query = $objDAO->excluirGrupo($idProjeto);

if($query){
    echo "<script type='text/javascript'>"
    . "location.href = '../view/grupos.php';"
    . "</script>";
} else{
    echo "<script type='text/javascript'>"
    . " alert ('Erro ao excluir grupo.');"
    . "history.go(-1);"
    . "</script>";
}

?>

