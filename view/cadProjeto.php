<?php
    require_once("cabecalho.php");
?>
        <div class="formularioCad formularios">
            <form name="cadProjeto" id="cadProjeto" action="../php/cadProjeto.php" method="post">
                <p>
                    <label for="nomeProjeto">Nome do Projeto: </label>
                    <input name="nomeProjeto" type="text" class="form-control" placeholder="Digite o nome do projeto" maxlength="20">
                </p>
                <p>
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" required="required" class="form-control" placeholder="Digite a descrição do projeto" maxlength="100">
                </p>                
                <p>
                    <label for="dataInicio">Data de início: </label>
                    <input type="date" name="dataInicio" class="form-control">
                </p>
                <p>
                    <label for="dataFim">Data final: </label>
                    <input type="date" name="dataFim" class="form-control">
                </p>
                <p class="text-right">
                    <input type="submit" name="btnCadProjeto" value="Cadastrar Projeto" class="botao btnBloq">
                </p>
                <a href="inicio.php">Voltar</a>
            </form>
        </div>
    </body>
</html>
