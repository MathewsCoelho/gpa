<?php

include_once '../php/TO/BancoTO.php';

class TarefaDAO{
    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }
    
    public function salvarTarefa($objTO){        
        $sql = "INSERT INTO tarefa(nome_tarefa, descricao, data_inicio, data_fim, data_cadastro, status_tarefa, id_projeto) "
            . "VALUES('".$objTO->getnomeTarefa()."', '". $objTO->getDescricao() . "', '". $objTO->getdataInicio() . "', 
            '" . $objTO->getdataFim() . "', '" . $objTO->getdataCadastro() . "', " . $objTO->getstatusTarefa() . ", " . $objTO->getidProjeto() . ")";
        
        $query = mysqli_query($this->BancoTO->conn, $sql);
                        
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    
    public function buscarTarefa($id){
        $sql = "SELECT * FROM tarefa WHERE id_projeto = " . $id;
        $tarefas = array(); 
        $query = mysqli_query($this->BancoTO->conn, $sql);                 
        if($query && mysqli_num_rows($query) > 0){     
            while($tarefa = mysqli_fetch_assoc($query))
                array_push($tarefas, $tarefa);
            return $query; 
        } else{
            return false;
        }
    }
    
    public function buscarTarefaEspecifica($id){
        $sql = "SELECT * FROM tarefa WHERE id_tarefa = " . $id;
        
        $query = mysqli_query($this->BancoTO->conn, $sql);
        
        if($query && mysqli_num_rows($query) > 0){
            return $query;
        } else{
            return false;
        }
    }    
    
    public function excluirTarefa($id){  
        $sql = "DELETE FROM tarefa WHERE id_tarefa = " . $id;
        
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function editarTarefa($objTO, $id){  
        $sql = "UPDATE tarefa SET " 
            . "nome_tarefa='". $objTO->getnomeTarefa() ."', " 
            . "descricao='". $objTO->getDescricao() ."', " 
            . "data_inicio='". $objTO->getdataInicio() ."', "  
            . "data_fim='". $objTO->getdataFim() ."', " 
            . "status_tarefa='" . $objTO->getstatusTarefa() . "' "
            . "WHERE id_tarefa = " . $id;
          
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function concluirTarefa($id){
        
        $sql = "UPDATE tarefa SET " 
        . "status_tarefa=" . " 2 "
        . "WHERE id_tarefa = " . $id;
                
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
}


?>

