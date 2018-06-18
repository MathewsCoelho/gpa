<?php
    require_once("cabecalho.php");
    include '../php/cadGrupo3.php';              
    $query = buscarGrupo($_SESSION['id']);
?>
    <body>         
        <div class="btnProjeto">
            <a href="cadGrupo.php" class="btn btn-default btn-lg btn-group-justified">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Novo Grupo
            </a>
        </div>
        <?php
            foreach($query as $grupo){
        ?>
            <div class="col-lg-md-sm projeto <?= $grupo['status_projeto'] ?>">
                <h3 class="principal"> 
                    <a class="btn btn-default btn-lg " href="../projetos/listagemTarefas.php?<?php echo base64_encode("idGrupo"). "=" . base64_encode($grupo['id_grupo']);?>">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span> <?= $grupo['nome_grupo']; ?>
                    </a>
                </h3>   
                <h4 class="descricao">Descrição: <?= $grupo['descricao']; ?></h4>
                <div class="btn-group">
                    <a href="editaGrupo.php?<?php echo base64_encode("idGrupo"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnEdicao">Editar</a>
                    <a href="../php/excluiGrupo.php?<?php echo base64_encode("idGrupo"). "=" . base64_encode($grupo['id_grupo']);?>" class="botao btnPerigo">Excluir</a>
                </div>
            </div>
        <?php      
            }
        ?>
        
    </body>
</html>
