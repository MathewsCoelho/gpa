<?php
    require_once("cabecalho.php");
	require_once('../php/DAO/ConviteDAO.php'); 
    $objDAO = new ConviteDAO();
    $query = $objDAO->buscarConvites($_SESSION['id']);
    if($query){
?>
		<div class="conteudo1">
            <table class="tableTarefas">
                <tr>
                    <th> Grupo </th>
                    <th> Descrição </th>
                    <th> Opções </th>
                </tr>
            <?php
                foreach($query as $convite){            
            ?>
	                <tr>
	                    <td><?= $convite['nome_grupo']; ?> </td>   
	                    <td> <?= $convite['descricao']; ?></td>

	                    <td class="btn-group">
	                        <a href="../php/convites.php?status=1&&id_convite=<?= $convite['id_convite'] ?>&&id_grupo=<?= $convite['id_grupo']; ?>&&tipo=<?= $convite['tipo'] ?>" class="botao btnSucesso">Aceitar</a>
	                        <a href="../php/convites.php?status=0&&id_convite=<?= $convite['id_convite'] ?>" class="botao btnPerigo">Rejeitar</a>
	                    </td>
	                </tr>            
            <?php
                }
            ?>
            </table>
        </div>
<?php 
    }
?>
    </body>
</html>
