<?php

class TarefaDAO{
    
    public function __construct() {}
    
    public function salvarTarefa($objTO){
        
        include '../php/incConecta.php';
        
        $sql = "INSERT INTO tarefa(nome_tarefa, descricao, data_inicio, data_fim, data_cadastro, status_tarefa, id_projeto) "
            . "VALUES('".$objTO->getnomeTarefa()."', '". $objTO->getDescricao() . "', '". $objTO->getdataInicio() . "', 
            '" . $objTO->getdataFim() . "', '" . $objTO->getdataCadastro() . "', " . $objTO->getstatusTarefa() . ", " . $objTO->getidProjeto() . ")";
        
        $query = mysqli_query($conexao, $sql);
                        
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    
    public function buscarTarefa($id){
        include '../php/incConecta.php';
        
        $sql = "SELECT * FROM tarefa WHERE id_projeto = " . $id;
                
        $query = mysqli_query($conexao, $sql);
                        
        if($query && mysqli_num_rows($query) > 0){
            
            return $query; 
            
        } else{
            return false;
        }
    }
    
    public function buscarTarefaEspecifica($id){
        
        include '../php/incConecta.php';
        
        $sql = "SELECT * FROM tarefa WHERE id_tarefa = " . $id;
        
        $query = mysqli_query($conexao, $sql);
        
        if($query && mysqli_num_rows($query) > 0){
            return $query;
        } else{
            return false;
        }
    }    
    
    public function excluirTarefa($id){
        
        include '../php/incConecta.php';
        
        $sql = "DELETE FROM tarefa WHERE id_tarefa = " . $id;
        
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function editarTarefa($objTO, $id){
        
        include '../php/incConecta.php';
                
        $sql = "UPDATE tarefa SET " 
            . "nome_tarefa='". $objTO->getnomeTarefa() ."', " 
            . "descricao='". $objTO->getDescricao() ."', " 
            . "data_inicio='". $objTO->getdataInicio() ."', "  
            . "data_fim='". $objTO->getdataFim() ."', " 
            . "status_tarefa='" . $objTO->getstatusTarefa() . "' "
            . "WHERE id_tarefa = " . $id;
          
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function concluirTarefa($id){
        
        include '../php/incConecta.php';
        
        $sql = "UPDATE tarefa SET " 
        . "status_tarefa=" . " 2 "
        . "WHERE id_tarefa = " . $id;
                
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
}


?>

