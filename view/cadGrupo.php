<?php
    require_once('cabecalho.php');
?>
    <body>
        <div class="formularioCad">            
            <form name="cadastroGrupo" id="Cadastro" action="../php/cadGrupo2.php" method="post">
                <p>
                    <label for="nomeProjeto">Nome do Projeto: </label>
                    <input name="nomeProjeto" type="text" class="form-control" placeholder="Digite o nome do Projeto" maxlength="20">
                </p>
                
                <p>
                    <label for="descricao">Descrição: </label>
                    <input name="descricao" type="text" class="form-control" placeholder="Digite a descrição do Projeto" maxlength="100">
                </p>
                
                <p>
                    <label> Email do Colaborador: </label>
                    <input name="email" type="text" class="form-control" placeholder="Digite o email do Colaborador" maxlength="50">
                </p>
                
                <p>
                    <label>
                        <input type="button" name="btnAdd" value="+" class="btn btn-primary">
                        Clique aqui para adicionar outro colaborador  
                    </label>
                </p>
               
                <p>
                    <label> Data de Início: </label>
                    <input name="dataInicio" type="date" class="form-control">
                </p>
                
                <p>
                    <label> Data de Termino: </label>
                    <input name="dataFim" type="date" class="form-control">
                </p>
                                
                <p class="text-right">
                    <input type="submit" name="btnCadastro" value="Cadastrar Projeto do Grupo" class="btn btn-primary btn-block">
                </p>
                
                <a href="grupos.php" class="text-center">
                    Voltar
                </a>
            </form>
        </div>
    </body>
</html>
