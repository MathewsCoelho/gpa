<?php

    require_once("cabecalho.php");
    
?>
    <body>
                
        <div class="btnProjeto">
            <a href="cadGrupo.php" class="btn btn-default btn-lg btn-group-justified">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Novo Grupo
                </a>
        </div>
        <?php
                include '../php/cadGrupo3.php';
                    
                $query = buscarGrupo($_SESSION['id']);
                if($query){    
                    while($linha = mysqli_fetch_array($query)) {
                        $dataIni = explode("-", $linha['data_inicio']);
                        $dataIni = $dataIni[2]."/".$dataIni[1]."/".$dataIni[0];

                        $dataFinal = explode("-", $linha['data_fim']);
                        $dataFinal = $dataFinal[2]."/".$dataFinal[1]."/".$dataFinal[0];
        ?>
        
                        <div class="col-lg-md-sm projeto <?php echo $linha['status_projeto'] ?>">
                            <h3 class="principal"> 
                                <?php echo $linha['nome_projeto']; ?>
                                <br>
                                <a class="btn btn-default btn-lg " href="../projetos/listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>">
                                    <span class="glyphicon glyphicon-folder-open" aria-hidden="true"> </span> Abrir Projeto
                                </a>
                            </h3>   

                            <h4>Data de Início: <?php echo $dataIni; ?></h4>
                            <h4>Data de Término:<?php echo $dataFinal; ?> </h4>
                            <h4 class="descricao">Descrição: <?php echo $linha['descricao']; ?></h4>
                            <h4> Status: <?php echo $linha['status_projeto']; ?></h4>


                            <div class="btn-group">
                                <a href="../php/concluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-success">Concluir Projeto</a>
                                <a href="../projetos/editaProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-primary">Editar</a>
                                <a href="../php/excluiProjeto.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($linha['id_projeto']);?>" class="btn btn-danger btnExcluir">Excluir</a>
                            </div>
                        </div>
        <?php
                }
            }
        ?>
        
    </body>
</html>
