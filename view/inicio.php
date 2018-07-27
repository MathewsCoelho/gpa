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
            <button type="button" class="botao btnPadrao" data-toggle="modal" data-target="#cadastroProjeto">
                <p> <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo Projeto </p>
            </button>
        </div>
    </div>

    <div class="backAndamento">
        <div class="projDiv">
            <h3 class="status molengo"> 
                Em Andamento 
                <i class="andamento fa fa-caret-down" aria-hidden="true"></i>
            </h3>
        </div>

        <div class="flex flex-wrap" id="iniciada">
            <?php
            if($query1){
                foreach($query1 as $projetoAnd){
                    $dataIni = date('d/m/Y', strtotime($projetoAnd['data_inicio']));
                    $dataFinal = date('d/m/Y', strtotime($projetoAnd['data_fim']));
                    ?>
                <div class="col-lg-md-sm projeto">
                    <div class="principal"> 
                        <a class="btn btn-default btn-lg" href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAnd['id_projeto'])?>">
                            <i class="fa fa-folder-open" aria-hidden="true"></i>  <?= $projetoAnd['nome_projeto']; ?>
                        </a>
                    </div>   
                    <h5><b> Data de Início: </b> <?= $dataIni; ?></h5>
                    <h5><b> Data de Término:</b> <?= $dataFinal; ?> </h5>
                    <h5 class="descricao"><b> Descrição: </b> <?= $projetoAnd['descricao']; ?> </h5>
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
                <i class="atrasado fa fa-caret-down" aria-hidden="true"></i>
            </h3>
        </div>
        <div class="flex flex-wrap" id="atrasada">
            <?php
            foreach($query2 as $projetoAtr){
                $dataIni = date('d/m/Y', strtotime($projetoAtr['data_inicio']));
                $dataFinal = date('d/m/Y', strtotime($projetoAtr['data_fim']));
            ?>
            <div class="col-lg-md-sm projeto">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoAtr['id_projeto'])?>">
                        <i class="fa fa-folder-open" aria-hidden="true"></i> <p> <?= $projetoAtr['nome_projeto']; ?> </p>
                    </a>
                </div>   
                <h5> <b> Data de Início: </b> <?= $dataIni; ?></h5>
                <h5> <b> Data de Término: </b> <?= $dataFinal; ?> </h5>
                <h5 class="descricao"> <b> Descrição: </b> <?= $projetoAtr['descricao']; ?></h5>
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
                <i class="finalizado fa fa-caret-down" aria-hidden="true"></i>
            </h3>
        </div>
        <div class="flex flex-wrap" id="finalizada">
            <?php
            foreach($query3 as $projetoFin){
                $dataIni = date('d/m/Y', strtotime($projetoFin['data_inicio']));
                $dataFinal = date('d/m/Y', strtotime($projetoFin['data_fim']));
            ?>
            <div class="col-lg-md-sm projeto">
                <div class="principal"> 
                    <a class="btn btn-default btn-lg " href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($projetoFin['id_projeto'])?>">
                        <i class="fa fa-folder-open" aria-hidden="true"></i> <?= $projetoFin['nome_projeto']; ?> 
                    </a>
                </div>   
                <h5><b> Data de Início: </b> <?= $dataIni; ?></h5>
                <h5><b> Data de Término: </b> <?= $dataFinal; ?> </h5>
                <h5 class="descricao"><b> Descrição: </b> <?= $projetoFin['descricao']; ?></h5>
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
                        <div class="form-group">
                            <label for="nomeProjeto">Nome do Projeto: </label>
                            <input name="nomeProjeto" type="text" class="form-control" placeholder="Digite o nome do projeto" maxlength="20">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição: </label>
                            <input type="text" name="descricao" required="required" class="form-control" placeholder="Digite a descrição do projeto" maxlength="100">
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
                            <input type="submit" name="btnCadProjeto" value="Cadastrar Projeto" class="botao btnBloq btnNovo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
