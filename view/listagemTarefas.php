    <?php
        require_once('cabecalho.php');
        $index = base64_encode('idProjeto');
        $idProjeto = base64_decode($_GET[$index]);
    ?>
        <?php
        include '../php/cadProjeto2.php';
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
                    include '../php/cadTarefa2.php';
                    $query = buscarTarefa($idProjeto);
                    if($query){
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
                        while($linha = mysqli_fetch_array($query)) {            
                            $dataIni = explode("-", $linha['data_inicio']);
                            $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];             
                            $dataFinal = explode("-", $linha['data_fim']);
                            $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
                ?>

                <tr>
                    <td></td>
                    <td><?= $linha['nome_tarefa']; ?> </td>   
                    <td> <?= $dataIni; ?></td>
                    <td> <?= $dataFinal; ?> </td>
                    <td> <?= $linha['descricao']; ?></td>
                    <td> <?= $linha['status_tarefa']; ?></td>

                    <td class="btn-group">
                        <a href="../php/concluirTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>" class="btn btn-success">Concluir</a>
                        <a href="editaTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>&idProjeto=<?php echo base64_encode($idProjeto) ?>" class="btn btn-primary">Editar</a>
                        <a href="../php/excluiTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>" class="btn btn-danger btnExcluirTarefa">Excluir</a>
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
