<?php
    require_once("cabecalho.php");
    include '../php/cadGrupo3.php';              
    $query = buscarGrupo($_SESSION['id']);
?>
    <body>         
        <div class="conteudo1">
            <div class="btnProjeto">
                <button type="button" class="botao btnPadrao" data-toggle="modal" data-target="#cadastroGrupo">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo Grupo
                </button>
            </div>
        </div>
        <?php
            foreach($query as $grupo){
        ?>
            <div class="col-lg-md-sm grupo">
                <h3 class="principalGrupo">
                    <form action="projetoGrupo.php" method="POST">
                        <input type="hidden" name="idGrupo" value="<?= $grupo['id_grupo'] ?>"> 
                        <div class="group">
                            <p> 
                                <i class="fa fa-users" aria-hidden="true"></i>  
                                <input type="submit" name="projetosGrupo" value="<?= $grupo['nome_grupo']; ?>">    
                            </p>
                        </div>
                    </form>
                </h3>   
                <h5 class="descricao"><b> Descrição: </b> <?= $grupo['descricao']; ?></h5>
                <div class="btn-group"> 
                    <a href="editaGrupo.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnEdicao">Editar</a>

                    <a href="../php/excluiGrupo.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnPerigo btnExcluirGrupo"> Excluir </a>
                </div>
            </div>
        <?php      
            }
        ?>
        <div id="cadastroGrupo" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Cadastro de Grupo</h4>
                    </div>
                    <div class="modal-body">
                        <form name="cadastroGrupo" id="Cadastro" action="../php/cadGrupo.php" method="post">
                            <div class="form-group">
                                <label for="nomeGrupo">Nome do Grupo: </label>
                                <input name="nomeGrupo" type="text" class="form-control" placeholder="Digite o nome do Grupo" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição: </label>
                                <input name="descricao" type="text" class="form-control" placeholder="Digite a descrição do Grupo" maxlength="100">
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" name="btnCadastro" value="Cadastrar Grupo" class="botao btnBloq btnNovo">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
