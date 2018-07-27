<?php
	require_once('cabecalho.php');
    if(!isset($_SESSION['id_grupo'])){
        $idGrupo = $_POST['idGrupo'];
        $_SESSION["id_grupo"] = $idGrupo;
    }
    include('../php/cadGrupo3.php');
    $query = buscarGrupoEspecifico($_SESSION["id_grupo"]);
    $grupo = mysqli_fetch_array($query);
?>
    <div class="header2">
        <ul class="nav nav-pills">
            <li> <a> <?= $grupo['nome_grupo']; ?> </a> </li>
            <li> <a>  <?= $grupo['descricao']; ?> </a> </li>
            <li> <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a> </li> 
        </ul>
    </div>
    <div class="conteudo1">
        <div class="btnProjeto">
        	<div class="btn-group">
                <a href="cadProjeto.php" class="botao btnPadrao">
                    <p> <span class="fa fa-plus-circle" aria-hidden="true"></span> Novo Projeto </p>
                </a>
            </div>
            <div class="btn-group">
                <a href="cadMembro.php" class="botao btnPadrao">
                    <p> <i class="fa fa-user-plus" aria-hidden="true"></i> Adicionar Membros </p>
                </a>
        	</div>
        </div>
    </div>