<?php
    require_once("cabecalho.php");
    $index = base64_encode('idProjeto');
    $idProjeto = base64_decode($_GET[$index]);
    include "../php/cadProjeto2.php";
    $query = buscaProjetoEspecifico($idProjeto);
    $linha = mysqli_fetch_array($query);
?>
        <div class="formularioCad formularios">
            <form name="cadProjeto" id="cadProjeto" action="../php/editaProjeto2.php?idProjeto=<?= $idProjeto ?>" method="post">
                <p>
                    <label for="nomeProjeto">Nome do Projeto: </label>
                    <input name="nomeProjeto" type="text" class="form-control" value="<?= $linha['nome_projeto'] ?>" maxlength="20">
                </p>
                <p>
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" class="form-control" value="<?= $linha['descricao'] ?>" maxlength="100">
                </p>
                <p>
                    <label for="dataInicio">Data de início: </label>
                    <input type="date" name="dataInicio" class="form-control" value="<?= $linha['data_inicio'] ?>">
                </p>
                <p>
                    <label for="dataFim">Data final: </label>
                    <input type="date" name="dataFim" class="form-control" value="<?= $linha['data_fim'] ?>">
                </p>   
                <p>
                    <label for="statusProjeto">Status: </label>
                    <select name="statusProjeto" class="selectpicker form-control">
                        <option value="1">Em Andamento </option>
                        <option value="2"> Finalizado </option>
                    </select>
                </p>
                <p class="text-right">
                    <input type="submit" name="btnCadProjeto" value="Editar Projeto" class="botao btnBloq">
                </p> 
            </form>
            <a href="inicio.php">
                Voltar
            </a>
        </div>
    </body>
</html>
