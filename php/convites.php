<?php
	session_start();
	$id_convite = $_GET['id_convite'];
	$status = $_GET['status'];
	
	include_once 'DAO/ConviteDAO.php';
	$objDAO = new ConviteDAO();
	
	if($status == 0){
		$query = $objDAO->excluirConvite($id_convite);
		if($query){
			$_SESSION['success'] = "Convite recusado.";
		    echo "<script type='text/javascript'>"
		    . "history.go(-1);"
		    . "</script>";
		} else{  
			 $_SESSION['danger'] = "Erro ao excluir convite.";
		    echo "<script type='text/javascript'>"
		    . "history.go(-1);"
		    . "</script>";
		}
	}

	else if($status == 1){
		$id_grupo = $_GET['id_grupo'];
		$tipo = $_GET['tipo'];
		$id_usuario = $_SESSION['id'];
	    include_once 'TO/MembroTO.php';
        $objTO2 = new MembroTO();
        $objTO2->setidUsuario($id_usuario);
        $objTO2->setidGrupo($id_grupo);
        $objTO2->settipo($tipo);

        include_once 'DAO/MembroDAO.php';

        $objDAO2 = new MembroDAO();
            if($objDAO2->salvarMembro($objTO2)){
            	 $_SESSION['success'] = "Convite aceito.";
	            $query = $objDAO->excluirConvite($id_convite);
	            echo "<script type='text/javascript'>"
	            . " location.href = '../view/convites.php'"
	            . "</script>";
            }
            else{
            	 $_SESSION['danger'] = "Falha ao aceitar convite.";
                echo "<script type='text/javascript'>"
            . " history.go(-1);"
            . "</script>";
            }
	}
?>