<?php
    require_once("cabecalho.php");
    $index = base64_encode('idProjeto');
    $idProjeto = base64_decode($_GET[$index]);
?>
        <div class="formularioCad">
            <form name="cadTarefa" id="cadTarefa" action="../php/cadTarefa.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto); ?>" method="post">
                <p>
                    <label for="nomeTarefa">Nome da Tarefa: </label>
                    <input name="nomeTarefa" type="text" class="form-control" placeholder="Digite o nome da tarefa" maxlength="20">
                </p>
                <p>
                    <label for="descricao">Descrição: </label>
                    <input type="text" name="descricao" required="required" class="form-control" placeholder="Digite a descrição da tarefa" maxlength="100">
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
                    <input type="submit" name="btnCadTarefa" value="Cadastrar Tarefa" class="botao btnBloq">
                </p>
            </form>
            <a href="listagemTarefas.php?<?php echo base64_encode("idProjeto"). "=" . base64_encode($idProjeto); ?>">
                    Voltar
            </a>
        </div>
    </body>
</html>
