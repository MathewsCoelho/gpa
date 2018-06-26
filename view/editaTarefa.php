<?php
    require_once('cabecalho.php');
    $idTarefa = base64_decode($_GET['idTarefa']);
    $idProjeto = base64_decode($_GET['idProjeto']);
    include '../php/cadTarefa2.php';
    $query = buscaTarefaEspecifica($idTarefa);
    $linha = mysqli_fetch_array($query);
?>
        <div class="formularioCad formularios">
            <form name="cadTarefa" id="cadTarefa" action="../php/editaTarefa2.php?idTarefa=<?= $idTarefa; ?>&idProjeto=<?= $idProjeto; ?>" method="post">
                <p>
                    <label for="nomeTarefa">Nome da Tarefa: </label>
                    <input name="nomeTarefa" type="text" class="form-control" value="<?= $linha['nome_tarefa'] ?>" maxlength="20">
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
                    <label for="statusTarefa">Status: </label>
                    <select name="statusTarefa" class="selectpicker form-control">
                        <option value="1">Iniciada</option>
                        <option value="2"> Finalizada </option>
                        <option value="3">Atrasada</option>
                    </select>
                </p>
                <p class="text-right">
                    <input type="submit" name="btnCadTarefa" value="Editar Tarefa" class="btn btn-primary btn-padrao btn-block">
                </p> 
                <a href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>">
                    Voltar
                </a>
            </form>
        </div>
    </body>
</html>
