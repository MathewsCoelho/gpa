    <?php
        require_once('cabecalho.php');
        $index = base64_encode('idProjeto');
        $idProjeto = base64_decode($_GET[$index]);
    ?>
        <div class="btnProjeto">
            <a href="cadTarefa.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>" class="btn btn-default btn-lg btn-group-justified">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Nova Tarefa
            </a>
        </div>

        <div class="col-lg-md-sm projeto projetoEspecifico">
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
                        <h3 class="listagem"> 
                            <?= $linha['nome_projeto']; ?>
                            <br>
                        </h3>   

                        <h4>Data de Início: <?= $dataIni; ?></h4>
                        <h4>Data de Término:<?= $dataFinal; ?> </h4>
                        <h4 class="descricao">Descrição: <?= $linha['descricao']; ?></h4>
                        <h4>Status: <?php echo $linha['status_projeto']; $x = $linha['status_projeto']; ?></h4>
                <?php
                    }
                }
            ?>
        </div>       
            <?php
                include '../php/cadTarefa2.php';
                $query = buscarTarefa($idProjeto);
                if($query){
            ?>
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
                    while($linha = mysqli_fetch_array($query)) {            
                        $dataIni = explode("-", $linha['data_inicio']);
                        $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];             
                        $dataFinal = explode("-", $linha['data_fim']);
                        $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>

            <tr>
                <td><?= $linha['nome_tarefa']; ?> </td>   
                <td> <?= $dataIni; ?></td>
                <td> <?= $dataFinal; ?> </td>
                <td> <?= $linha['descricao']; ?></td>
                <?php
                    if($x == "Finalizado"){
                ?>
                        <td> Finalizada </td>
                <?php
                    } else{
                ?> 
                        <td> <?= $linha['status_tarefa']; ?></td>
                        <td class="btn-group">
                            <a href="../php/concluirTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>" class="btn btn-success">Concluir</a>
                            <a href="editaTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>&idProjeto=<?php echo base64_encode($idProjeto) ?>" class="btn btn-primary">Editar</a>
                            <a href="../php/excluiTarefa.php?idTarefa=<?php echo base64_encode($linha['id_tarefa'])?>" class="btn btn-danger btnExcluirTarefa">Excluir</a>
                        </td>
            </tr>
                <?php
                    }
                ?>
            
                <?php
                        }
                    }
                ?>
        </table>
    </body>
</html>
