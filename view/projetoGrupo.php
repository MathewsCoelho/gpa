<?php
	require_once('cabecalho.php');
    $idGrupo = $_POST['idGrupo'];
    include('../php/cadGrupo3.php');
    $query = buscarGrupoEspecifico($idGrupo);
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
            <a href="cadProjeto.php" class="btn btn-default btn-lg ">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Novo Projeto
            </a>
            <a href="cadMembro.php" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Adicionar Membros
            </a>
        	</div>
        </div>
    </div>