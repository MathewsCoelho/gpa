<?php
	require_once('cabecalho.php');
?>
	<div class="formularioCad formularios">
		<form name="cadastroGrupo" id="Cadastro" action="../php/cadConvite.php" method="post">
			<div class="form-group">
		        <label> Email do Colaborador: </label>
		        <input name="emailConvidado" type="text" class="form-control" placeholder="Digite o email do Colaborador" maxlength="50">
		    </div>
		    <div class="form-group">
		        <label> Mensagem: </label>
		        <textarea name="descricao" class="form-control" rows="5"> </textarea>
		    </div>
		    <div class="form-group">
		        <label for="tipo">Nível de Permissão: </label>
		        <select name="tipo" class="selectpicker form-control">
		            <option value="1"> Visualizar </option>
		            <option value="2"> Gerenciar </option>
		        </select>
		    </div>   
		    <div class="text-right form-group">
		        <input type="submit" name="btnCadastro" value="Enviar Convite" class="botao btnBloq btnNovo">
		    </div>         
		</form>
	</div>
</body>