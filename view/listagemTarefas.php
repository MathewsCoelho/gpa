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
        <div class="header2 <?= $linha['status_projeto']; ?> ">
            <ul class="nav nav-pills">
                <li> <a> <?= $linha['nome_projeto']; ?> </a> </li>
                <li> <a>  <?= $dataIni; ?> </a> </li>
                <li> <a>  <?= $dataFinal; ?> </a> </li>
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
                <a href="cadTarefa.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto);?>" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Nova Tarefa
                </a>
            </div>
        </div>      
                <?php
                    if($query2){
                ?>
        <div class="conteudo1">
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
    </body>
</html>
