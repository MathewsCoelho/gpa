<?php
	require_once('cabecalho.php');
?>
	<div class="formularioCad formularios">
	<form name="cadastroGrupo" id="Cadastro" action="../php/cadGrupo.php" method="post">
		<p>
	        <label> Email do Colaborador: </label>
	        <input name="email" type="text" class="form-control" placeholder="Digite o email do Colaborador" maxlength="50">
	    </p>   
	    <p class="text-right">
	        <input type="submit" name="btnCadastro" value="Enviar Convite" class="botao btnBloq">
	    </p>         
	</form>
	</div>
