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
                <div class="form-group">
                    <label for="nomeTarefa">Nome da Tarefa: </label>
                    <input name="nomeTarefa" type="text" class="form-control" value="<?= $linha['nome_tarefa'] ?>" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" class="form-control" value="<?= $linha['descricao'] ?>" maxlength="100">
                </div>
                <div class="form-group">
                    <label for="dataInicio">Data de início: </label>
                    <input type="date" name="dataInicio" class="form-control" value="<?= $linha['data_inicio'] ?>">
                </div>
                <div class="form-group">
                    <label for="dataFim">Data final: </label>
                    <input type="date" name="dataFim" class="form-control" value="<?= $linha['data_fim'] ?>">
                </div>   
                <div class="form-group">
                    <label for="statusTarefa">Status: </label>
                    <select name="statusTarefa" class="selectpicker form-control">
                        <option value="1">Iniciada</option>
                        <option value="2"> Finalizada </option>
                        <option value="3">Atrasada</option>
                    </select>
                </div>
                <div class="text-right form-group">
                    <input type="submit" name="btnCadTarefa" value="Editar Tarefa" class="botao btnBloq btnNovo">
                </div> 
                <a href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>">
                    Voltar
                </a>
            </form>
        </div>
    </body>
</html>
