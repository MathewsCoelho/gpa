<?php
    session_start();
    $email = $_POST['emailConvidado'];
    $id_grupo = $_SESSION['id_grupo'];
    $id_remetente = $_SESSION['id_usuario'];

    if(empty($email) || empty($id_grupo) || empty($id_remetente)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        require 'TO/MembroTO.php';

        $objTO = new MembroTO();
        $objTO->setidUsuario($_SESSION["id"]);
        $objTO->setidGrupo($idGrupo);

        include_once 'DAO/MembroTO.php';

        $objDAO = new MembroDAO();
            if($objDAO->salvarMembro($objTO)){
            echo "<script type='text/javascript'>"
            . " location.href = '../view/grupos.php'"
            . "</script>";
            }
            else{
                echo "<script type='text/javascript'>"
            . "alert('Convite enviado com sucesso.');"
            . " history.go(-1);"
            . "</script>";
            }
        } else {
            echo "<script type='text/javascript'>"
            . "alert('Falha ao enviar convite.');"
            . " history.go(-1);"
            . "</script>";
        } 
    }
?>

