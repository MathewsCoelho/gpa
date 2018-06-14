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
                
                    if($query1){
                        while($linha = mysqli_fetch_array($query1)) {
                            $dataIni = explode("-", $linha['data_inicio']);
                            $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                            $dataFinal = explode("-", $linha['data_fim']);
                            $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
            <div class="col-lg-md-sm projeto <?= $linha['status_projeto'] ?>">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto'])?>">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?= $linha['nome_projeto']; ?>
                    </a>
                </div>   

                <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4><b> Data de Término:</b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"><b> Descrição: </b> <?= $linha['descricao']; ?> </h4>
                    <div class="btn-group">
                        <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-success">Concluir</a>
                        <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-primary">Editar</a>
                        <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
                    </div>
            </div>        
                <?php
                        }
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
                if($query2){
                    while($linha2 = mysqli_fetch_array($query2)){
                        $dataIni = explode("-", $linha2['data_inicio']);
                        $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                        $dataFinal = explode("-", $linha2['data_fim']);
                        $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
        <div class="col-lg-md-sm projeto Atrasado">
            <div class="principal"> 
                <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha2['id_projeto'])?>">
                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?= $linha2['nome_projeto']; ?>
                </a>
            </div>   
            <h4> <b> Data de Início: </b> <?= $dataIni; ?></h4>
            <h4> <b> Data de Término: </b> <?= $dataFinal; ?> </h4>
            <h4 class="descricao"> <b> Descrição: </b> <?= $linha2['descricao']; ?></h4>
            <div class="btn-group">
                <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha2['id_projeto']);?>" class="btn btn-success">Concluir</a>
                <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha2['id_projeto']);?>" class="btn btn-primary">Editar</a>
                <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha2['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
            </div>
        </div>
                <?php
                        }
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
                if($query3){
                    while($linha3 = mysqli_fetch_array($query3)){
                        $dataIni = explode("-", $linha3['data_inicio']);
                        $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];                   
                        $dataFinal = explode("-", $linha3['data_fim']);
                        $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
            <div class="col-lg-md-sm projeto <?= $linha3['status_projeto'] ?>">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha3['id_projeto'])?>">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span>  <?php echo $linha3['nome_projeto']; ?>
                    </a>
                </div>   
                <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4><b> Data de Término: </b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"><b> Descrição: </b> <?= $linha3['descricao']; ?></h4>
                <div class="btn-group">
                    <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha3['id_projeto']);?>" class="btn btn-primary">Editar</a>
                    <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha3['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
                </div>
            </div>
                <?php
                        }
                    }
                ?>
        </div>
    </div>
    </body>
</html>
