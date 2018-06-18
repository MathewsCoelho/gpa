<?php
    require_once('cabecalho.php');
?>
        <div class="formularioCad">            
            <form name="cadastroGrupo" id="Cadastro" action="../php/cadGrupo.php" method="post">
                <p>
                    <label for="nomeGrupo">Nome do Grupo: </label>
                    <input name="nomeGrupo" type="text" class="form-control" placeholder="Digite o nome do Projeto" maxlength="20">
                </p>
                <p>
                    <label for="descricao">Descrição: </label>
                    <input name="descricao" type="text" class="form-control" placeholder="Digite a descrição do Projeto" maxlength="100">
                </p>
                <p class="text-right">
                    <input type="submit" name="btnCadastro" value="Cadastrar Grupo" class="botao btnBloq">
                </p>
                <!--<p>
                    <label> Email do Colaborador: </label>
                    <input name="email" type="text" class="form-control" placeholder="Digite o email do Colaborador" maxlength="50">
                </p> !-->             
            </form>
            <a href="grupos.php" class="text-center">
                Voltar
            </a>
        </div>
    </body>
</html>
