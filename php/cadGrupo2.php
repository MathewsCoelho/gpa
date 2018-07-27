<?php
    session_start();
    $nomeProjeto = $_POST['nomeProjeto'];
    $descricao = $_POST['descricao'];
    $email = $_POST['email'];
    $dataInicio = $_POST['dataInicio'];
    $dataFim = $_POST['dataFim'];
    $statusProjeto = 1;
            
    if(empty($nomeProjeto) || empty($descricao) || empty($email)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{

        include 'TO/GrupoTO.php';

        $objTO = new GrupoTO($nomeProjeto, $descricao, $email, $dataInicio, $dataFim, $statusProjeto, $_SESSION["id"]);

        include 'DAO/GrupoDAO.php';

        $objDAO = new GrupoDAO();

        if ($objDAO->salvarGrupo($objTO)) {
            echo "<script type='text/javascript'>"
            . " location.href = '../grupos/grupos.php'"
            . "</script>";
        } else {
            echo "<script type='text/javascript'>"
            . "alert('Usuário já está cadastrado.');"
            . " history.go(-1);"
            . "</script>";
        }
}
?>

