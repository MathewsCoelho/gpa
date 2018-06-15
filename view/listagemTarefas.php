    <?php
        require_once('cabecalho.php');
        include_once '../php/cadProjeto2.php';
        $index = base64_encode('idProjeto');
        $idProjeto = base64_decode($_GET[$index]);
        include '../php/cadTarefa2.php';
        $query2 = buscarTarefa($idProjeto);
        $query = buscaProjetoEspecifico($idProjeto);
        if ($query){
            while ($linha = mysqli_fetch_array($query)){
                $dataIni = explode("-", $linha['data_inicio']);
                $dataIni = $dataIni[2] . "/" . $dataIni[1] . "/" . $dataIni[0];
                $dataFinal = explode("-", $linha['data_fim']);
                $dataFinal = $dataFinal[2] . "/" . $dataFinal[1] . "/" . $dataFinal[0];
        ?>
        <div class="header2">
            <ul class="nav nav-pills">
                <li> <a> <b> <?= $linha['nome_projeto']; ?> </b> </a> </li>
                <li> <a> <b> <?= $dataIni; ?> </b> </a> </li>
                <li> <a> <b> <?= $dataFinal; ?> </b> </a> </li>
                 <li> <a> <b> <?= $linha['status_projeto']; ?> </b> </a> </li>
            </ul>
        </div>
        <?php
                }
            }
        ?>
        <div class="conteudo1">
            <div class="btnProjeto">
                <a href="cadTarefa.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Nova Tarefa
                </a>
            </div>
        </div>      
                <?php
                    if($query2){
                ?>
        <div class="conteudo2">
            <table class="tableTarefas">
                <tr>
                    <th> Etiquetas </th>
                    <th> Tarefa </th>
                    <th> Data de Início </th>
                    <th> Data de Término </th>
                    <th> Descrição </th>
                    <th> Status </th>
                    <th> Opções </th>
                </tr>
                <?php
                        foreach($query2 as $tarefa){            
                            $dataIni = explode("-", $tarefa['data_inicio']);
                            $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];             
                            $dataFinal = explode("-", $tarefa['data_fim']);
                            $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
                ?>

                <tr>
                    <td></td>
                    <td><?= $tarefa['nome_tarefa']; ?> </td>   
                    <td> <?= $dataIni; ?></td>
                    <td> <?= $dataFinal; ?> </td>
                    <td> <?= $tarefa['descricao']; ?></td>
                    <td> <?= $tarefa['status_tarefa']; ?></td>

                    <td class="btn-group">
                        <a href="../php/concluirTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>" class="btn btn-success">Concluir</a>
                        <a href="editaTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>&idProjeto=<?php echo base64_encode($idProjeto) ?>" class="btn btn-primary">Editar</a>
                        <a href="../php/excluiTarefa.php?idTarefa=<?php echo base64_encode($tarefa['id_tarefa'])?>" class="btn btn-danger btnExcluirTarefa">Excluir</a>
                    </td>
                </tr>
                
                    <?php
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>
