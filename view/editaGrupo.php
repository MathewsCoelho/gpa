<?php
    require_once('cabecalho.php');
    $index = base64_encode('idProjeto');
    $idProjeto = base64_decode($_GET[$index]);
    include('../php/cadGrupo3.php');
    $query = buscarGrupoEspecifico($idProjeto);
    $grupo = mysqli_fetch_array($query);
?>
        <div class="formularioCad formularios">            
            <form name="cadastroGrupo" id="Cadastro" action="../php/editaGrupo.php" method="post">
                <input type="hidden" name="id_grupo" value="<?= $grupo['id_grupo']?>">
                <div class="form-group">
                    <label for="nomeGrupo">Nome do Grupo: </label>
                    <input name="nomeGrupo" type="text" class="form-control" value="<?= $grupo['nome_grupo'] ?>" placeholder="Digite o nome do Projeto" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição: </label>
                    <input name="descricao" type="text" class="form-control" value="<?= $grupo['descricao'] ?>" placeholder="Digite a descrição do Projeto" maxlength="100">
                </div>
                <div class="form-group text-right">
                    <input type="submit" name="btnCadastro" value="Editar Grupo" class="botao btnBloq btnNovo">
                </div>       
            </form>
            <a href="grupos.php" class="text-center">
                Voltar
            </a>
        </div>
    </body>
</html>
