<?php
    require_once("cabecalho.php");
    require_once('../php/DAO/ProjetoDAO.php'); 
    $status = 'Iniciado';
    $objDAO = new ProjetoDAO();
    $query1 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status);
    $status2 = 'Atrasado';
    $query2 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status2);
    $status3 = 'Finalizado';
    $query3 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status3);
?>
    <div class="conteudo1">
        <div class="btnProjeto">
            <a href="cadProjeto.php" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Novo Projeto
            </a>
        </div>
    </div>
    <div class="backAndamento">
        <div class="projDiv">
            <h3 class="status andamento"> Andamento </h3>
        </div>

        <div class="flex flex-wrap" id="iniciada">
            <?php
            foreach($query1 as $projetoAnd){
                $dataIni = explode("-", $projetoAnd['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                $dataFinal = explode("-", $projetoAnd['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0]; 
            ?>
            <div class="col-lg-md-sm projeto <?= $projetoAnd['status_projeto'] ?>">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto'])?>">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?= $projetoAnd['nome_projeto']; ?>
                    </a>
                </div>   
                <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4><b> Data de Término:</b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"><b> Descrição: </b> <?= $projetoAnd['descricao']; ?> </h4>
                    <div class="btn-group">
                        <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="btn btn-success">Concluir</a>
                        <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="btn btn-primary">Editar</a>
                        <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
                    </div>
            </div>        
            <?php       
            }
            ?>

        </div>
    </div>
    <div class="backAtrasado">
        <div class="projDiv">
            <h3 class="status atrasado"> Atrasados </h3>
        </div>
        <div class="flex flex-wrap" id="atrasada">
            <?php
            foreach($query2 as $projetoAtr){
                $dataIni = explode("-", $projetoAtr['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                $dataFinal = explode("-", $projetoAtr['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
        <div class="col-lg-md-sm projeto Atrasado">
            <div class="principal"> 
                <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto'])?>">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?= $projetoAtr['nome_projeto']; ?>
                </a>
            </div>   
            <h4> <b> Data de Início: </b> <?= $dataIni; ?></h4>
            <h4> <b> Data de Término: </b> <?= $dataFinal; ?> </h4>
            <h4 class="descricao"> <b> Descrição: </b> <?= $projetoAtr['descricao']; ?></h4>
            <div class="btn-group">
                <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="btn btn-success">Concluir</a>
                <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="btn btn-primary">Editar</a>
                <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
            </div>
        </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="backFinalizado">
         <div class="projDiv">
            <h3 class="status finalizado"> Finalizados </h3>
        </div>
        <div class="flex flex-wrap" id="finalizada">
            <?php
            foreach($query3 as $projetoFin){
                $dataIni = explode("-", $projetoFin['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];                   
                $dataFinal = explode("-", $projetoFin['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
            <div class="col-lg-md-sm projeto <?= $projetoFin['status_projeto'] ?>">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto'])?>">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?php echo $projetoFin['nome_projeto']; ?>
                    </a>
                </div>   
                <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4><b> Data de Término: </b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"><b> Descrição: </b> <?= $projetoFin['descricao']; ?></h4>
                <div class="btn-group">
                    <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto']);?>" class="btn btn-primary">Editar</a>
                    <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    </body>
</html>
