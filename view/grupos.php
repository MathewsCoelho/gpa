<?php
    require_once("cabecalho.php");
    include '../php/cadGrupo3.php';              
    $query = buscarGrupo($_SESSION['id']);
?>
    <body>         
        <div class="conteudo1">
        <div class="btnProjeto">
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#cadastroGrupo">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Novo Grupo
            </button>
        </div>
    </div>
        <?php
            foreach($query as $grupo){
        ?>
            <div class="col-lg-md-sm projeto <?= $grupo['status_projeto'] ?>">
                <h3 class="principal">
                    <form action="projetoGrupo.php" method="POST">
                        <input type="hidden" name="idGrupo" value="<?= $grupo['id_grupo'] ?>"> 
                        <input type="submit" name="projetosGrupo" class="btn btn-default btn-lg" value="<?= $grupo['nome_grupo']; ?>">
                    </form>
                </h3>   
                <h4 class="descricao">Descrição: <?= $grupo['descricao']; ?></h4>
                <div class="btn-group"> 
                    <a href="editaGrupo.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnEdicao">Editar</a>

                    <a href="../php/excluiGrupo.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnPerigo"> Excluir </a>
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
                            <p>
                                <label for="nomeGrupo">Nome do Grupo: </label>
                                <input name="nomeGrupo" type="text" class="form-control" placeholder="Digite o nome do Grupo" maxlength="20">
                            </p>
                            <p>
                                <label for="descricao">Descrição: </label>
                                <input name="descricao" type="text" class="form-control" placeholder="Digite a descrição do Grupo" maxlength="100">
                            </p>
                            <p class="text-right">
                                <input type="submit" name="btnCadastro" value="Cadastrar Grupo" class="botao btnBloq">
                            </p> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
