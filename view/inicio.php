<?php
    require_once("cabecalho.php");
    require_once('../php/DAO/ProjetoDAO.php'); 
    $objDAO = new ProjetoDAO();
    $status = 'Em Andamento';
    $query1 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status);
    $status2 = 'Atrasado';
    $query2 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status2);
    $status3 = 'Finalizado';
    $query3 = $objDAO->buscarProjetoStatus($_SESSION['id'], $status3);
?>
    <div class="conteudo1">
        <div class="btnProjeto">
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#cadastroProjeto">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo Projeto
            </button>
        </div>
    </div>

    <div class="backAndamento">
        <div class="projDiv">
            <h3 class="status "> 
                Em Andamento 
                <i class="andamento fa fa-sort-desc" aria-hidden="true"></i>
            </h3>
        </div>

        <div class="flex flex-wrap" id="iniciada">
            <?php
            if($query1){
            foreach($query1 as $projetoAnd){
                $dataIni = explode("-", $projetoAnd['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                $dataFinal = explode("-", $projetoAnd['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0]; 
            ?>
                <div class="col-lg-md-sm projeto">
                    <div class="principal"> 
                        <a class="btn btn-default btn-lg" href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto'])?>">
                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>  <?= $projetoAnd['nome_projeto']; ?>
                        </a>
                    </div>   
                    <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                    <h4><b> Data de Término:</b> <?= $dataFinal; ?> </h4>
                    <h4 class="descricao"><b> Descrição: </b> <?= $projetoAnd['descricao']; ?> </h4>
                    <div class="btn-group">
                        <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="botao btnSucesso">Concluir</a>
                        <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="botao btnEdicao">Editar</a>
                        <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto']);?>" class="botao btnPerigo btnExcluir">Excluir</a>
                    </div>
                </div>        
            <?php       
                }
            }
            ?>
        </div>
    </div>
    <div class="Atrasado">
        <div class="projDiv">
            <h3 class="status"> Atrasados 
                <i class="atrasado fa fa-sort-desc" aria-hidden="true"></i>
            </h3>
        </div>
        <div class="flex flex-wrap" id="atrasada">
            <?php
            foreach($query2 as $projetoAtr){
                $dataIni = explode("-", $projetoAtr['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];
                $dataFinal = explode("-", $projetoAtr['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
            <div class="col-lg-md-sm projeto">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto'])?>">
                        <i class="fa fa-folder-open-o" aria-hidden="true"></i>  <?= $projetoAtr['nome_projeto']; ?>
                    </a>
                </div>   
                <h4> <b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4> <b> Data de Término: </b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"> <b> Descrição: </b> <?= $projetoAtr['descricao']; ?></h4>
                <div class="btn-group">
                    <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="botao btnSucesso">Concluir</a>
                    <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="botao btnEdicao">Editar</a>
                    <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto']);?>" class="botao btnPerigo btnExcluir">Excluir</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="Finalizado">
        <div class="projDiv">
            <h3 class="status"> Finalizados 
                <i class="finalizado fa fa-sort-desc" aria-hidden="true"></i>
            </h3>
        </div>
        <div class="flex flex-wrap" id="finalizada">
            <?php
            foreach($query3 as $projetoFin){
                $dataIni = explode("-", $projetoFin['data_inicio']);
                $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];                   
                $dataFinal = explode("-", $projetoFin['data_fim']);
                $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
            ?>
            <div class="col-lg-md-sm projeto">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto'])?>">
                        <i class="fa fa-folder-open-o" aria-hidden="true"></i>  <?php echo $projetoFin['nome_projeto']; ?>
                    </a>
                </div>   
                <h4><b> Data de Início: </b> <?= $dataIni; ?></h4>
                <h4><b> Data de Término: </b> <?= $dataFinal; ?> </h4>
                <h4 class="descricao"><b> Descrição: </b> <?= $projetoFin['descricao']; ?></h4>
                <div class="btn-group">
                    <a href="editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto']);?>" class="botao btnEdicao">Editar</a>
                    <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto']);?>" class="botao btnPerigo btnExcluir">Excluir</a>
                </div>
            </div>
            <?php 
                }
            ?>
        </div>
    </div>
    <div id="cadastroProjeto" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cadastro de Projeto</h4>
                </div>
                <div class="modal-body">
                    <form name="cadProjeto" id="cadProjeto" action="../php/cadProjeto.php" method="post">
                        <p>
                            <label for="nomeProjeto">Nome do Projeto: </label>
                            <input name="nomeProjeto" type="text" class="form-control" placeholder="Digite o nome do projeto" maxlength="20">
                        </p>
                        <p>
                            <label for="descricao">Descrição: </label>
                            <input type="text" name="descricao" required="required" class="form-control" placeholder="Digite a descrição do projeto" maxlength="100">
                        </p>                
                        <p>
                            <label for="dataInicio">Data de início: </label>
                            <input type="date" name="dataInicio" class="form-control">
                        </p>
                        <p>
                            <label for="dataFim">Data final: </label>
                            <input type="date" name="dataFim" class="form-control">
                        </p>
                        <p class="text-right">
                            <input type="submit" name="btnCadProjeto" value="Cadastrar Projeto" class="botao btnBloq">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
