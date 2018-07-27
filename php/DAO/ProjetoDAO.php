<?php 
include_once '../php/TO/BancoTO.php';

class ProjetoDAO{    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }    
    public function salvarProjeto($objTO){        
        $sql = "INSERT INTO projeto(nome_projeto, descricao, data_inicio, data_fim, data_cadastro, id_usuario, status_projeto) "
            . "VALUES('".$objTO->getnomeProjeto()."', '".$objTO->getDescricao()."', '".$objTO->getdataInicio()."', 
            '".$objTO->getdataFim() . "', '" . $objTO->getdataCadastro() . "', '" . $objTO->getidUsuario(). "', ". $objTO->getstatusProjeto() . ")";       
        $query = mysqli_query($this->BancoTO->conn, $sql);
                        
        if($query){
            return $query;
        } else{
            return false;
        }
    }    
    public function buscarProjeto($id){  
        $sql = "SELECT * FROM projeto WHERE id_usuario = " . $id;            
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query && mysqli_num_rows($query) > 0){        
            return $query; 
        } else{
            return false;
        }
    }
    public function buscarProjetoStatus($id, $status){
        $sql = "SELECT * FROM projeto WHERE id_usuario = $id AND status_projeto = '$status'" ;    
        $projetos = array();
        $query = mysqli_query($this->BancoTO->conn, $sql);           
        if($query){
            while($projeto = mysqli_fetch_assoc($query))
                array_push($projetos, $projeto);
            return $projetos;         
        } else{
            return false;
        }
    }   
    public function buscarProjetoEspecifico($id){
        $sql = "SELECT * FROM projeto WHERE id_projeto = " . $id;
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query && mysqli_num_rows($query) > 0){
            return $query;
        } else{
            return false;
        }
    }   
    public function excluirProjeto($id){
        $sql = "DELETE FROM projeto WHERE id_projeto = " . $id;
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
    }    
    public function editarProjeto($objTO, $id){
        $sql = "UPDATE projeto SET " 
            . "nome_projeto='". $objTO->getnomeProjeto() ."', " 
            . "descricao='". $objTO->getDescricao() ."', " 
            . "data_inicio='". $objTO->getdataInicio() ."', "  
            . "data_fim='". $objTO->getdataFim() ."', " 
            . "status_projeto='" . $objTO->getstatusProjeto() . "' "
            . "WHERE id_projeto = " . $id;    
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }      
    }    
    public function concluirProjeto($id){    
        $sql = "UPDATE projeto SET " 
        . "status_projeto=" . " 2 "
        . "WHERE id_projeto = " . $id;
                
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
    }
}


?>

