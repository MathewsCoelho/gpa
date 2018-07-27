<?php
    require_once('cabecalho.php');
    include_once '../php/cadProjeto2.php';
    $index = base64_encode('idProjeto');
    $idProjeto = base64_decode($_GET[$index]);
    include '../php/cadTarefa2.php';
    $query2 = buscarTarefa($idProjeto);
    $query = buscaProjetoEspecifico($idProjeto);
    if($query){
        while ($linha = mysqli_fetch_array($query)){
            $dataIni = date('d/m/Y', strtotime($linha['data_inicio']));
            $dataFinal = date('d/m/Y', strtotime($linha['data_fim']));
    ?>
    <div class="header2 <?= $linha['status_projeto']; ?> ">
        <ul class="nav nav-pills">
            <li> <a> <?= $linha['nome_projeto']; ?> -</a> </li>
            <li> <a>  <?= $dataIni; ?> -</a> </li>
            <li> <a>  <?= $dataFinal; ?> -</a> </li>
            <li> <a>  <?= $linha['status_projeto']; ?> </a> </li>
            <li> <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a> </li> 
        </ul>
    </div>
<?php
        }
    }
?>
    <div class="conteudo1">
        <div class="btnProjeto">
            <button type="button" class="botao btnPadrao" data-toggle="modal" data-target="#cadastroTarefa">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Nova Tarefa
            </button>
        </div>
    </div>      
<?php
    if($query2){
?>
        <div class="conteudo1">
            <table class="tableTarefas">
                <tr>
                    <th> Tarefa </th>
                    <th> Data de Início </th>
                    <th> Data de Término </th>
                    <th> Descrição </th>
                    <th> Status </th>
                    <th> Opções </th>
                </tr>
            <?php
                foreach($query2 as $tarefa){            
                    $dataIni = date('d/m/Y', strtotime($tarefa['data_inicio']));
                    $dataFinal = date('d/m/Y', strtotime($tarefa['data_fim']));
            ?>
                    <tr>
                        <td><?= $tarefa['nome_tarefa']; ?> </td>   
                        <td> <?= $dataIni; ?></td>
                        <td> <?= $dataFinal; ?> </td>
                        <td> <?= $tarefa['descricao']; ?></td>
                        <td> <?= $tarefa['status_tarefa']; ?></td>
                        <td class="btn-group">
                            <a href="../php/concluirTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>" class="botao btnSucesso">Concluir</a>
                            <a href="editaTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>&idProjeto=<?php echo base64_encode($idProjeto) ?>" class="botao btnEdicao">Editar</a>
                            <a href="../php/excluiTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>" class="botao btnPerigo btnExcluirTarefa">Excluir</a>
                        </td>
                    </tr>
        <?php
                }
            }
        ?>
            </table>
        </div>

    <div id="cadastroTarefa" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cadastro de Tarefa</h4>
                </div>
                <div class="modal-body">
                     <form name="cadTarefa" id="cadTarefa" action="../php/cadTarefa.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto); ?>" method="post">
                        <div class="form-group">
                            <label for="nomeTarefa">Nome da Tarefa: </label>
                            <input name="nomeTarefa" type="text" class="form-control" placeholder="Digite o nome da tarefa" maxlength="20">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição: </label>
                            <input type="text" name="descricao" required="required" class="form-control" placeholder="Digite a descrição da tarefa" maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="dataInicio">Data de início: </label>
                            <input type="date" name="dataInicio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dataFim">Data final: </label>
                            <input type="date" name="dataFim" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" name="btnCadTarefa" value="Cadastrar Tarefa" class="botao btnBloq btnNovo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
